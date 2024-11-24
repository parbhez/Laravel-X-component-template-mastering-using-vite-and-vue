<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CategoryCreated implements ShouldBroadcast
{
    public $category;
    public $userId;

    public function __construct(Post $category, $userId)
    {
        Log::info('CategoryCreated event fired for user: ' . $userId);

        $this->category = $category;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        \Log::info("Entry On: ");
        \Log::info("User Id = " . $this->userId);
        return [
            new PrivateChannel('category.' . $this->userId),
            new PrivateChannel('notification.' . $this->userId),
        ]; // এই চ্যানেলে ব্রডকাস্ট হবে
    }

    public function broadcastAs()
    {
        \Log::info("Entry AS: ");
        return 'category.created';
    }
}
