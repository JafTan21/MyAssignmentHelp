<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin 
        User::create([
            'name' => 'default admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ])->assignRole('admin');

        //users
        User::create([
            'name' => 'user 2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('user2@gmail.com'),
        ]);
        User::create([
            'name' => 'user 3',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('user3@gmail.com'),
        ]);
    }
}
