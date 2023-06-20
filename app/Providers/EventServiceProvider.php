<?php

namespace App\Providers;

use App\Events\ExamScoreUpdated;
use App\Events\PreassessmentUpdated;
use Illuminate\Support\Facades\Event;
use App\Events\FinalAssessmentUpdated;
use Illuminate\Auth\Events\Registered;
use App\Events\InterviewAssessmentUpdated;
use App\Listeners\ExamScoreUpdatedListener;
use App\Listeners\PreassessmentUpdatedListener;
use App\Listeners\FinalAssessmentUpdatedListener;
use App\Listeners\InterviewAssessmentUpdatedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\ApplicantCreated' => [
            'App\Listeners\AssignApplicantToBatch',
        ],
        PreassessmentUpdated::class => [
            PreassessmentUpdatedListener::class,
        ],
        InterviewAssessmentUpdated::class => [
            InterviewAssessmentUpdatedListener::class,
        ],
        FinalAssessmentUpdated::class => [
            FinalAssessmentUpdatedListener::class,
        ],
        ExamScoreUpdated::class => [
            ExamScoreUpdatedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
