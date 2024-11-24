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

class CategoryCreatedRole implements ShouldBroadcast
{
    public $category;
    public $roleName;

    public function __construct(Post $category, $roleName)
    {
        Log::info('CategoryCreated event fired for user: ' . $roleName);

        $this->category = $category;
        $this->roleName = $roleName;
    }

    public function broadcastOn()
    {
        \Log::info("User Id = " . $this->roleName);
        return [
            new PrivateChannel('category.role.' . $this->roleName),
        ]; // এই চ্যানেলে ব্রডকাস্ট হবে
    }

    public function broadcastAs()
    {
        \Log::info("Entry AS: ");
        return 'category.created';
    }
}
