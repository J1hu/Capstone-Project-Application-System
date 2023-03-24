<?php

namespace Database\Seeders;

use App\Models\ApplicantMother;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantMotherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantMother::factory()->times(50)->create();
    }
}
