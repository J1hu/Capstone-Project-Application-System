<?php

namespace Database\Seeders;

use App\Models\AcadAward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcadAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcadAward::factory()->times(50)->create();
    }
}
