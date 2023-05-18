<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicationStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'verified',
            'filled',
            'pending',
            'passed',
            'file resubmit',
            'backed out',
            'for exam',
            'passed exam',
            'failed exam',
            'for interview',
            'passed interview',
            'failed interview',
            'for orientation',
            'done orientation',
            'for enrollment'
        ];

        foreach ($statuses as $statuses) {
            ApplicationStatus::create(['application_status_name' => $statuses]);
        }
    }
}
