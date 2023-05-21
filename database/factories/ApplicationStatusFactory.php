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
                //pending
                'verified',
                'filled',
                'pending',
                'file resubmit',
                'for exam',
                'passed exam',
                'for interview',
                'passed interview',
                'for orientation',
                //evaluated
                'done orientation',
                'for enrollment',
                'passed',
                //failed
                'failed interview',
                'failed exam',
                'backed out',
            ])
        ];
    }
}
