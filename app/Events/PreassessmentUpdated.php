<?php

namespace App\Events;

use App\Models\Preassessment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PreassessmentUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $preassessment;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Preassessment  $preassessment
     * @return void
     */
    public function __construct(Preassessment $preassessment)
    {
        $this->preassessment = $preassessment;
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
