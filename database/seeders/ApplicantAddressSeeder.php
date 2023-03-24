<?php

namespace Database\Seeders;

use App\Models\ApplicantAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantAddress::factory()->times(50)->create();
    }
}
