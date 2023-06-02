<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HouseOwnership>
 */
class HouseOwnershipFactory extends Factory
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
            'ownership_type' => fake()->text(10)
        ];
    }
}
