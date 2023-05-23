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
        $types = [
            'Owned, Fully Paid',
            'Owned, Amortized',
            'Rented',
            'Free/Living with relatives/Inherited'
        ];

        foreach ($types as $types) {
            HouseOwnership::create(['internet_name' => $types]);
        }
    }
}
