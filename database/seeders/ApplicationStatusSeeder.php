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
            //pending
            'verified',
            'filled',
            'pending',
            'file resubmit',
            'for exam',
            'passed exam',
            'for interview',
            'passed interview',
            'for orientation',
            //evaluated
            'done orientation',
            'for enrollment',
            'passed',
            //failed
            'failed interview',
            'failed exam',
            'backed out',
        ];

        foreach ($statuses as $statuses) {
            ApplicationStatus::create(['application_status_name' => $statuses]);
        }
    }
}
