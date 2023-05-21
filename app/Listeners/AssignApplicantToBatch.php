<?php

namespace App\Listeners;

use App\Models\Batch;
use App\Events\ApplicantCreated;
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
        $currentDate = date('Y-m-d');

        // Check if a batch for the current date exists and is not archived
        $batch = Batch::where('current_date', $currentDate)->where('is_archived', false)->first();

        if (!$batch) {
            // If a batch does not exist, create a new one
            $batchNumber = Batch::getNextBatchNumber();
            $batch = Batch::create([
                'batch_num' => $batchNumber,
                'current_date' => $currentDate,
            ]);
        }

        // Assign the applicant to the appropriate batch
        $applicant->batch_id = $batch->id;
        $applicant->save();
    }
}
