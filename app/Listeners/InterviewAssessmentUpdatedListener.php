<?php

namespace App\Listeners;

use App\Events\InterviewAssessmentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InterviewAssessmentUpdatedListener
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
     * @param  \App\Events\InterviewAssessmentUpdated  $event
     * @return void
     */
    public function handle(InterviewAssessmentUpdated $event)
    {
        $initialAssessment = $event->initialAssessment;

        // Check if the initialAssessment has value
        if ($initialAssessment->remarks) {
            $applicant = $initialAssessment->applicant;

            // Update the application status of the specific applicant to 'passed interview'
            $applicant->application_status_id = 8;
            $applicant->save();
        }
    }
}
