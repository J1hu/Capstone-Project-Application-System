<?php

namespace App\Listeners;

use App\Models\Batch;
use App\Events\ApplicantCreated;
use App\Models\SchoolYear;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignApplicantToBatch
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ApplicantCreated  $event
     * @return void
     */
    public function handle(ApplicantCreated $event)
    {
        $applicant = $event->applicant;

        // Get the active school year
        $schoolYear = SchoolYear::where('is_archived', false)->first();

        // Get the current month
        $currentDate = date('Y-m-d');
        // $currentDate = '2023-06-22';

        if (!$schoolYear) {
            // If no active school year exists, create a new one
            $currentYear = date('Y');
            $nextYear = $currentYear + 1;
            $schoolYearString = $currentYear . '-' . $nextYear;

            $schoolYear = SchoolYear::create([
                'year' => $schoolYearString,
                'is_archived' => false,
            ]);
        }

        // Check if a batch for the current date exists and is not archived
        $batch = Batch::where('current_date', $currentDate)->first();

        if (!$batch) {
            // If no batch exists for the current month, create a new one with the next available batch number
            $batchNumber = Batch::getNextBatchNumber();
            $batch = $schoolYear->batches()->create([
                'batch_num' => $batchNumber,
                'school_year_id' => $schoolYear->id,
            ]);

            // Set the current date for the created batch
            $batch->current_date = $currentDate;
            $batch->save();

            // Assign the applicant to the appropriate batch
            $applicant->batch_id = $batch->id;
            $applicant->save();
        }

        // Assign the applicant to the appropriate batch
        $applicant->batch_id = $batch->id;
        $applicant->save();
    }
}
