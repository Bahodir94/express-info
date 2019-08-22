<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'isAdmin' => true,
            'role_id' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
