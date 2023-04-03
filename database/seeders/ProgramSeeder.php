<?php

namespace Database\Seeders;

use App\Models\Program;
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
                'BSIS',
                'ACT',
                'BSAIS',
                'BSA',
                'BAB',
                'BSSW',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
