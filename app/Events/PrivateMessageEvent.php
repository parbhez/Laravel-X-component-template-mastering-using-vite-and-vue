<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

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
            new PrivateChannel('private-chat.' . $this->toUserId)
        ];
    }

    // Optional: Specify event name
    public function broadcastAs()
    {
        return 'PrivateMessage';
    }
}
