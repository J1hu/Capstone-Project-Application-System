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
        $currentMonth = date('n');
        $currentYear = date('Y');
        $batchNumber = $currentMonth . '-' . $currentYear;

        // check if a batch with the batch number exists and is not archived
        $batch = Batch::where('batch_num', $batchNumber)->where('is_archived', false)->first();

        if (!$batch) {
            // create a new batch if it does not exist
            $batch = Batch::create(['batch_num' => $batchNumber]);
        }

        // assign the applicant to the appropriate batch
        $applicant->batch_id = $batch->id;
        $applicant->save();
    }
}
