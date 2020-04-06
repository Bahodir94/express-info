<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => 'Пароль должен быть не меньше :min',
            'password.required' => 'Укажите пароль',
            'password.confirmed' => 'Пароли должны совпадать',
            'email.required' => 'Укажите электронную почту',
            'email.email' => 'Электронная почта должна быть в формате example@example.com',
            'email.unique' => 'Такая электроннная почта уже зарегистрирована',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => '',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        abort_if($data['user_role'] === 'admin', 403);
        $role = Role::where('name', $data['user_role'])->first();
        abort_if(!$role, 400);
        $user->roles()->attach($role->id);
        $user->markEmailAsVerified();
        return $user;
    }
}