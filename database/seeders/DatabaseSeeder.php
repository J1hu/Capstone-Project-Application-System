<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\ProgramSeeder;

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

        $createAdmin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        User::factory()->create([
            'name' => 'applicant',
            'email' => 'applicant@test.com',
        ]);

        $assignAdmin = Role::create(['name' => 'admin']);
        $createAdmin->assignRole($assignAdmin);
    }
}
