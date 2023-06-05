<?php

namespace App\Listeners;

use App\Events\ApplicantRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendApplicantRegistrationNotification implements ShouldQueue
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
     * @param  \App\Events\ApplicantRegistered  $event
     * @return void
     */
    public function handle(ApplicantRegistered $event)
    {
        $user = $event->user;
    }
}
