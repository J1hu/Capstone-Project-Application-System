<?php

namespace Database\Seeders;

use App\Models\ExamScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamScore::factory()->times(50)->create();
    }
}
