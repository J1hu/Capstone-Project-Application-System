<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExamScoreFactory extends Factory
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
            'intelligence_score' => rand(70, 100),
            'aptitude_score' => rand(70, 100),
            'average_score' => rand(70, 100),
        ];
    }
}
