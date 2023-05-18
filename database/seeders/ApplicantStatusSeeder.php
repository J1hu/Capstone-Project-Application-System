<?php

namespace Database\Seeders;

use App\Models\ApplicantStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicantStatusSeeder extends Seeder
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
                'applicant_status_name' => 'pending',
            ],
            [
                'applicant_status_name' => 'evaluated',
            ],
            [
                'applicant_status_name' => 'failed',
            ],
        ];

        foreach ($statuses as $statuses) {
            ApplicantStatus::create($statuses);
        }
    }
}
