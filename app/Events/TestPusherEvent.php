<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestPusherEvent implements ShouldBroadcast
{
    public $data;
    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        Log::info("Boradcast On entry");

        return [
            new Channel("notification")
        ];
    }

    public function broadcastAs()
    {
        Log::info("Boradcast As entry");
        return 'post.created';
    }

    public function broadcastWith()
    {
        Log::info("Boradcast With entry");

        return $this->data;

        // return [
        //     'author' => $this->data->author,
        //     'title' => $this->data->title,
        // ];
    }
}
