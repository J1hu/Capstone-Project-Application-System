<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomError;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 50),
            'fname' => fake()->firstName(),
            'mname' => fake()->text(5),
            'lname' => fake()->lastName(),
            'applicant_type' => fake()->randomElement(['Old Student', 'New Student', 'Old Returnee']),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'birthdate' => fake()->date(),
            'phone_num' => fake()->phoneNumber(),
            'fb_link' => fake()->text(10),
            'religion' => fake()->text(10),
            'avatar' => fake()->text(5),
            'total_fam_members' => fake()->randomNumber(),
            'birth_order' => fake()->text(5),
            'last_school' => fake()->text(10),
            'last_school_address' => fake()->text(10),
            'school_type' => fake()->randomElement(['Public', 'Private', 'State University']),
            'lrn' => fake()->text(10),
            'esc_grantee' => fake()->randomElement(['Yes', 'No', 'N/A']),
            'esc_num' => fake()->text(10),
            'program_id' => rand(1, 6),
            'free_ebill_reason' => fake()->text(40),
            'monthly_rental' => fake()->randomElement([1000, 900, 12324, 3423.53, 23144.42]),
            'data_privacy_consent' => fake()->boolean(100),
            'date_accomplished' => fake()->date(),
            'batch_id' => rand(1, 50),
            'application_status_id' => rand(1, 4),
            'applicant_status_id' => rand(1, 2),
        ];
    }
}
