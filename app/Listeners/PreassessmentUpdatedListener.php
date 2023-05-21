<?php

namespace App\Listeners;

use App\Events\PreassessmentUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PreassessmentUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  PreassessmentUpdated  $event
     * @return void
     */
    public function handle(PreassessmentUpdated $event)
    {
        $preassessment = $event->preassessment;

        // Check if the preassessment has been approved
        if ($preassessment->is_approved) {
            $applicant = $preassessment->applicant;

            // Update the application status of the specific applicant to 'for exam'
            $applicant->application_status_id = 5;
            $applicant->save();
        }
    }
}
