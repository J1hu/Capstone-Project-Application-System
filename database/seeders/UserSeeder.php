<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt("12345678"), // password
        ];

        \App\Models\User::create($user);
    }
}
