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
        $types = [
            'Prepaid Mobile Data',
            'Postpaid Mobile Data',
            'Prepaid Wifi (Ex: Globe at Home, PLDT Home, etc.)',
            'Broadband Line (Ex: PLDT Fibr, Converge, Sky Fibr, etc.)'
        ];

        foreach ($types as $types) {
            InternetType::create(['internet_name' => $types]);
        }
    }
}
