<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantMother>
 */
class ApplicantMotherFactory extends Factory
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
            'mother_fname' => fake()->firstNameFemale(),
            'mother_mname' => fake()->text(5),
            'mother_lname' => fake()->lastName(),
            'mother_religion' => fake()->text(10),
            'mother_occupation' => fake()->text(10),
            'mother_annual_income' => fake()->text(10),
            'mother_phone_num' => fake()->phoneNumber()
        ];
    }
}
