<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'status_name' => 'evaluation',
            ],
            [
                'status_name' => 'examination',
            ],
            [
                'status_name' => 'interview',
            ],
            [
                'status_name' => 'assessment',
            ],
        ];

        foreach ($statuses as $statuses) {
            \App\Models\ApplicationStatus::create($statuses);
        }
    }
}
