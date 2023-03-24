<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BatchSeeder;
use Database\Seeders\GadgetSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\ProgramSeeder;
use Database\Seeders\AcadAwardSeeder;
use Database\Seeders\ApplicantSeeder;
use Database\Seeders\ExamScoreSeeder;
use Database\Seeders\EvaluationSeeder;
use Database\Seeders\ElectricBillSeeder;
use Database\Seeders\InternetTypeSeeder;
use Database\Seeders\HouseOwnershipSeeder;
use Database\Seeders\ApplicantFatherSeeder;
use Database\Seeders\ApplicantMotherSeeder;
use Database\Seeders\ScholarshipTypeSeeder;
use Database\Seeders\ApplicantAddressSeeder;
use Database\Seeders\ApplicantSiblingSeeder;
use Database\Seeders\ApplicantGuardianSeeder;
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
        $this->call(ScholarshipTypeSeeder::class);
        $this->call(BatchSeeder::class);
        $this->call(ApplicationStatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ApplicantSeeder::class);
        $this->call(ApplicantAddressSeeder::class);
        $this->call(ApplicantMotherSeeder::class);
        $this->call(ApplicantFatherSeeder::class);
        $this->call(ApplicantGuardianSeeder::class);
        $this->call(HouseOwnershipSeeder::class);
        $this->call(ExamScoreSeeder::class);
        $this->call(ApplicantSiblingSeeder::class);
        $this->call(AcadAwardSeeder::class);
        $this->call(GadgetSeeder::class);
        $this->call(InternetTypeSeeder::class);
        $this->call(ElectricBillSeeder::class);
        $this->call(EvaluationSeeder::class);

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
