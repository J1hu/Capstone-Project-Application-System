<?php

namespace Database\Seeders;

use App\Models\ApplicantGuardian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantGuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantGuardian::factory()->times(50)->create();
    }
}
