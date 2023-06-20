<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FinalAssessmentUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $finalAssessment;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\FinalAssessment  $finalAssessment
     * @return void
     */
    public function __construct($finalAssessment)
    {
        $this->finalAssessment = $finalAssessment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
