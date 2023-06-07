<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantAddress>
 */
class ApplicantAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $userCounter = 1;

    public function definition()
    {
        $region = Region::inRandomOrder()->first();
        $province = Province::where('region_id', $region->id)->inRandomOrder()->first();
        $municipality = Municipality::where('province_id', $province->id)->inRandomOrder()->first();
        $barangay = Barangay::where('municipality_id', $municipality->id)->inRandomOrder()->first();

        return [
            'applicant_id' => self::$userCounter++,
            'region' => $region->id,
            'province' => $province->id,
            'city_municipality' => $municipality->id,
            'barangay' => $barangay->id,
            'street' => $this->faker->text(10),
            'zip_code' => $this->faker->randomElement(['1232', '3213', '3002', '3003']),
        ];
    }
}
