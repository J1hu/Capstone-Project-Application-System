<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_name' => 'admin',
            ],
            [
                'role_name' => 'applicant',
            ],
            [
                'role_name' => 'registrar_staff',
            ],
            [
                'role_name' => 'program_head',
            ],
            [
                'role_name' => 'mancom',
            ]
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
