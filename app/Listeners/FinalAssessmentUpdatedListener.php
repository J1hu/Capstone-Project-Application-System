<?php

namespace App\Listeners;

use App\Events\FinalAssessmentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FinalAssessmentUpdatedListener
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
     * @param  \App\Events\FinalAssessmentUpdated  $event
     * @return void
     */
    public function handle(FinalAssessmentUpdated $event)
    {
        $finalAssessment = $event->finalAssessment;

        // Check if the final assessment is approved
        if ($finalAssessment->remarks) {
            $applicant = $finalAssessment->applicant;

            // Update the application status of the specific applicant to 'for orientation'
            $applicant->application_status_id = 9;
            $applicant->save();
        }
    }
}
