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

        // Get the latest active school year
        $schoolYear = SchoolYear::where('is_archived', 0)->latest()->first();

        // Get the current month
        $currentDate = date('Y-m-d');

        // Check if a batch for the current date exists and is not archived
        $batch = $schoolYear->batches()->whereMonth('current_date', '=', date('m'))->first();

        if (!$batch) {
            // If no batch exists for the current month, create a new one with the next available batch number
            $batchNumber = Batch::getNextBatchNumber();
            $batch = $schoolYear->batches()->create([
                'batch_num' => $batchNumber,
                'school_year_id' => $schoolYear->id,
                'current_date' => $currentDate,
            ]);
        }

        // Assign the applicant to the appropriate batch
        $applicant->batch_id = $batch->id;
        $applicant->save();
    }
}
