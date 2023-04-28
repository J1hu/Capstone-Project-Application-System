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
        $batchNumber = Batch::getNextBatchNumber();

        // check if a batch with the batch number exists and is not archived
        $batch = Batch::where('batch_num', $batchNumber)->where('is_archived', false)->first();

        if (!$batch) {
            // create a new batch if it does not exist
            $batch = Batch::create(['batch_num' => $batchNumber]);
        }

        // retrieve the last batch and check if it has reached its capacity
        $lastBatch = Batch::latest()->first();

        if ($lastBatch->applicants()->count() >= Batch::FULL_CAPACITY && !$lastBatch->is_archived) {
            // create a new batch if the last batch has reached its capacity and is not archived
            $batchNumber = Batch::getNextBatchNumber();
            $batch = Batch::create(['batch_num' => $batchNumber]);
        }

        // assign the applicant to the appropriate batch
        $applicant->batch_id = $batch->id;
        $applicant->save();
    }
}
