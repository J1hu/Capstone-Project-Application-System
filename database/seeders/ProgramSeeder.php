<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'program_name' => 'BSIS',
            ],
            [
                'program_name' => 'ACT',
            ],
            [
                'program_name' => 'BSAIS',
            ],
            [
                'program_name' => 'BSA',
            ],
            [
                'program_name' => 'BAB',
            ],
            [
                'program_name' => 'BSSW',
            ],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
    }
}
