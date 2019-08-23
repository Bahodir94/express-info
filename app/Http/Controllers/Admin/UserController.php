<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * User's repository
     *
     * @var UserRepositoryInterface
    */
    private $usersRepository;

    /**
     * Create a new controller instance
     *
     * @param UserRepositoryInterface $userRepository
     * @return void
    */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->usersRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => $this->usersRepository->all()
        ];

        return view('admin.pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'roles' => $this->usersRepository->allRoles()
        ];

        return view('admin.pages.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255'
        ]);
        $roleId = $request->get('roleId', 0);
        $this->usersRepository->create($request, $roleId);

        if ($request->has('saveQuit'))
            return redirect()->route('admin.users.index');
        else
            return redirect()->route('admin.users.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'user' => $this->usersRepository->get($id),
            'roles' => $this->usersRepository->allRoles()
        ];

        return view('admin.pages.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255'
        ]);
        $roleId = $request->get('roleId');
        $this->usersRepository->update($id, $request, $roleId);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->usersRepository->delete($id);

        return redirect()->route('admin.users.index');
    }

    /**
     * Change user's password
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, int $id)
    {
        $request->validate([
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ]);
        $user = $this->usersRepository->get($id);
        $newPassword = $request->get('newPassword');
        $user->savePassword($newPassword);
        return redirect()->back()->with('change_password_success', 'Пароль успешно изменён');
    }
}
