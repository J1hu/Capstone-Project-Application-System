<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(50)->create()->each(function ($user) {
            $programIds = Program::pluck('id')->shuffle()->take(rand(1, 6)); // Get a random number of program IDs
            $user->programs()->attach($programIds); // Attach the selected program IDs to the user
        });
    }
}
