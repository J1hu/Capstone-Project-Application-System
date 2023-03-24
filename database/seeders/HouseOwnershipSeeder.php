<?php

namespace Database\Seeders;

use App\Models\HouseOwnership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HouseOwnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HouseOwnership::factory()->times(50)->create();
    }
}
