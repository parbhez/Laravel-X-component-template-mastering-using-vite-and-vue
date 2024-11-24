<?php


use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('notification', function ($user) {
//     return true;
// });


// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('post.created.{userId}', function (User $user, $userId) {
//     \Log::info("User attempting to authenticate: ", ['user_id' => $user->id, 'channel_id' => $userId]);
//     return (int) $user->id === (int) $userId;
// });

Broadcast::channel('category.{userId}', function ($user, $userId) {
    \Log::info("User attempting to authenticate: ", ['user_id' => $user->id, 'channel_id' => (int) $userId]);
    return (int) $user->id === (int) $userId; // ব্যবহারকারীর আইডি সঠিকভাবে তুলনা করা হচ্ছে
});


Broadcast::channel('notification.{userId}', function ($user, $userId) {
    \Log::info("User attempting to authenticate: ", ['user_id' => $user->id, 'channel_id' => (int) $userId]);
    return (int) $user->id === (int) $userId; // ব্যবহারকারীর আইডি সঠিকভাবে তুলনা করা হচ্ছে
});


// routes/channels.php

Broadcast::channel('category.role.{roleName}', function ($user, $roleName) {
    // চেক করা হচ্ছে ব্যবহারকারীর 'role' কলামের মান
    return $user->role === $roleName;
});


// routes/channels.php

Broadcast::channel('App.Models.User.{userId}', function ($user, $userId) {
    // চেক করা হচ্ছে ব্যবহারকারীর 'id' চ্যানেলের 'userId' এর সাথে মিলছে কিনা
    return (int) $user->id === (int) $userId;
});

