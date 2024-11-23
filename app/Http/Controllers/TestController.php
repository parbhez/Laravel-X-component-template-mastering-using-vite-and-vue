<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\TestPusherEvent;
use App\Events\PrivateMessageEvent;
use App\Models\User;

class TestController extends Controller
{
    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Create the post
        $post = Post::create([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
        ]);

        // Dispatch the event with the post data
        event(new TestPusherEvent([
            'author' => $post->author,
            'title' => $post->title,
        ]));

        // Redirect with success message
        return redirect()->back()->with('successs', 'Post created successfully!');
    }


    public function sendMessage(Request $request)
    {
        $validated = User::find(2)->toArray();
        // Trigger the event
        event(new PrivateMessageEvent("Test Notification for private channel", $validated['id']));

        return response()->json(['status' => 'Message sent successfully!']);
    }
}
