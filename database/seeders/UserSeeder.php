<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        User::factory()->times(500)->create()->each(function ($user) use ($faker) {
            $programIds = Program::pluck('id')->shuffle()->take(rand(1, 6)); // Get a random number of program IDs
            $user->programs()->attach($programIds); // Attach the selected program IDs to the user
            $user->assignRole($faker->randomElement(['admin', 'applicant', 'registrar_staff', 'program_head', 'mancom']));
        });
    }
}
