<?php


namespace App\Repositories;


use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    /**
     * Get all users
     *
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Get user by it's id
     *
     * @param int $userId
     * @return User
     */
    public function get($userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * Create an User
     *
     * @param \Illuminate\Http\Request $userData
     * @param int $userRoleId
     * @return void
     */
    public function create($userData, $userRoleId)
    {
        $role = Role::findOrFail($userRoleId);
        $data = [
            'name' => $userData->get('name'),
            'email' => $userData->get('email'),
            'password' => Hash::make($userData->get('password'))
        ];
        $user = User::create($data);
        $user->roles()->attach($role);
        $user->save();
        if ($userData->file('image'))
            $user->uploadImage($userData->file('image'));
        else
            $user->setDefaultAvatar();
    }

    /**
     * Update an user
     *
     * @param int $userId
     * @param \Illuminate\Http\Request $userData
     * @return void
     */
    public function update($userId, $userData)
    {
        $data = [
            'name' => $userData->get('name'),
            'email' => $userData->get('email')
        ];
        $user = $this->get($userId);
        $user->update($data);
        $user->uploadImage($userData->file('image'));

    }

    /**
     * Delete user
     *
     * @param int $userId
     * @return void
     */
    public function delete($userId)
    {
        User::destroy($userId);
    }

    /**
     * Get all users with role 'admin'
     *
     * @return mixed
     */
    public function getAdmins()
    {
        $role = Role::where('name', 'admin')->first();
        return $role->users;
    }

    /**
     * Get all users with role 'customer'
     *
     * @return mixed
     */
    public function getCustomers()
    {
        $role = Role::where('name', 'customer')->first();
        return $role->users;
    }

    /**
     * Get all roles
     *
     * @return array
     */
    public function allRoles()
    {
        return Role::all();
    }
}
