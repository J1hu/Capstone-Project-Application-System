<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantFather>
 */
class ApplicantFatherFactory extends Factory
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
            'father_fname' => fake()->firstNameMale(),
            'father_mname' => fake()->text(5),
            'father_lname' => fake()->lastName(),
            'father_religion' => fake()->text(10),
            'father_occupation' => fake()->text(10),
            'father_annual_income' => fake()->text(10),
            'father_phone_num' => fake()->phoneNumber()
        ];
    }
}
