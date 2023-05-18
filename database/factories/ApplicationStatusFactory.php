<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicationStatus>
 */
class ApplicationStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'application_status_name' => fake()->randomElement([
                'verified',
                'filled',
                'pending',
                'passed',
                'file resubmit',
                'backed out',
                'for exam',
                'passed exam',
                'failed exam',
                'for interview',
                'passed interview',
                'failed interview',
                'for orientation',
                'done orientation',
                'for enrollment'
            ])
        ];
    }
}
