<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'applicant_id' => rand(1, 50),
            'province' => fake()->text(10),
            'city_municipality' => fake()->text(10),
            'barangay' => fake()->text(10),
            'street' => fake()->text(10),
            'zip_code' => fake()->randomNumber(),
        ];
    }
}
