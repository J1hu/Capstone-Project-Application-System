<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EvaluationFactory extends Factory
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
            'user_id' => rand(1, 50),
            'remarks' => fake()->text(50),
            'evaluation_type' => fake()->randomElement(['Pre-assessment', 'Initial', 'Final']),
            'approval' => fake()->boolean(80),
            'scholarship_type_id' => rand(1, 50)
        ];
    }
}
