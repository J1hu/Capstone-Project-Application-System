<?php

namespace App\Listeners;

use App\Events\ExamScoreUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ExamScoreUpdatedListener
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
     * @param  \App\Events\ExamScoreUpdated  $event
     * @return void
     */
    public function handle(ExamScoreUpdated $event)
    {
        $examScore = $event->examScore;

        // Check if the final assessment is approved
        if ($examScore->average_score) {
            $applicant = $examScore->applicant;

            // Update the application status of the specific applicant to 'for orientation'
            $applicant->application_status_id = 7;
            $applicant->save();
        }
    }
}
