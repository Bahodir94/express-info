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
        factory(\App\Models\User::class, function (Faker $faker){
            return [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'isAdmin' => true,
                'password' => bcrypt('password'),
            ];
        });
    }
}
