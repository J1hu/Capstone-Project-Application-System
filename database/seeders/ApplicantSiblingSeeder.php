<?php

namespace Database\Seeders;

use App\Models\ApplicantSibling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSiblingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantSibling::factory()->times(50)->create();
    }
}
