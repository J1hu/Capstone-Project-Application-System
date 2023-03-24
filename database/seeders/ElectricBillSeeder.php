<?php

namespace Database\Seeders;

use App\Models\ElectricBill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectricBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ElectricBill::factory()->times(50)->create();
    }
}
