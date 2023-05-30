<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use Illuminate\Support\Facades\File;

class JsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $jsonData = File::get('public/json/regions.json');
        $data = json_decode($jsonData, true);

        foreach ($data as $regionData) {
            $region = Region::create([
                'name' => $regionData['regionName']
            ]);

            foreach ($regionData['provinces'] as $provinceData) {
                $province = Province::create([
                    'name' => $provinceData['name'],
                    'region_id' => $region->id,
                    'region_name' => $region->name
                ]);

                foreach ($provinceData['municipalities'] as $municipalityData) {
                    $municipality = Municipality::create([
                        'name' => $municipalityData['name'],
                        'province_id' => $province->id,
                        'province_name' => $province->name,
                        'region_id' => $region->id,
                        'region_name' => $region->name
                    ]);

                    foreach ($municipalityData['barangays'] as $barangayName) {
                        Barangay::create([
                            'name' => $barangayName,
                            'municipality_id' => $municipality->id,
                            'municipality_name' => $municipality->name,
                            'province_id' => $province->id,
                            'province_name' => $province->name,
                            'region_id' => $region->id,
                            'region_name' => $region->name
                        ]);
                    }
                }
            }
        }

        echo "Data imported successfully!";
    }
}
