<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantSibling>
 */
class ApplicantSiblingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $userCounter = 1;
    public function definition()
    {
        return [
            'applicant_id' => self::$userCounter++,
            'full_name' => fake()->name(),
            'education_level' => fake()->text(10)
        ];
    }
}
