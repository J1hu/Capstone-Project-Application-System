<?php

namespace Database\Seeders;

use App\Models\InternetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternetType::factory()->times(50)->create();
    }
}
