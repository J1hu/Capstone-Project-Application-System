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
                'application_status_name' => 'evaluation',
            ],
            [
                'application_status_name' => 'examination',
            ],
            [
                'application_status_name' => 'interview',
            ],
            [
                'application_status_name' => 'assessment',
            ],
        ];

        foreach ($statuses as $statuses) {
            \App\Models\ApplicationStatus::create($statuses);
        }
    }
}
