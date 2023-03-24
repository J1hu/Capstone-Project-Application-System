<?php

namespace Database\Seeders;

use App\Models\ApplicantFather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantFatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantFather::factory()->times(50)->create();
    }
}
