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

class PrivateMessageEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $toUserId;

    public function __construct($message, $toUserId)
    {
        $this->message = $message;
        $this->toUserId = $toUserId;
    }

    // Private channel for the recipient user
    public function broadcastOn()
    {
        return [
            new PrivateChannel('post.created.' . $this->toUserId)
        ];
    }

    // Optional: Specify event name
    public function broadcastAs()
    {
        return 'PrivateMessage';
    }

    public function broadcastWith()
    {
        Log::info("Private Boradcast With entry");

        return [
            'title' => $this->message,
            'author' => $this->toUserId,
        ];
    }
}
