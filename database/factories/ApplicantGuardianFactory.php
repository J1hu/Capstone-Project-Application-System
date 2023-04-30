<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantGuardian>
 */
class ApplicantGuardianFactory extends Factory
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
            'guardian_fname' => fake()->firstName(),
            'guardian_mname' => fake()->text(5),
            'guardian_lname' => fake()->lastName(),
            'guardian_religion' => fake()->text(10),
            'guardian_occupation' => fake()->text(10),
            'guardian_annual_income' => fake()->text(10),
            'guardian_phone_num' => fake()->phoneNumber()
        ];
    }
}
