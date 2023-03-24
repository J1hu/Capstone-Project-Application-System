<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\ProgramSeeder;
use Database\Seeders\ApplicationStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProgramSeeder::class);
        $this->call(ApplicationStatusSeeder::class);

        $createAdmin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        $assignAdmin = Role::create(['name' => 'admin']);
        $createAdmin->assignRole($assignAdmin);

        Role::create(['name' => 'applicant']);
        Role::create(['name' => 'registrar_staff']);
        Role::create(['name' => 'program_head']);
        Role::create(['name' => 'mancom']);
    }
}
