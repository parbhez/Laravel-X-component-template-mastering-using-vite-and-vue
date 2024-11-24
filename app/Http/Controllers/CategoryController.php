<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\CategoryCreated;
use App\Events\CategoryCreatedRole;
use App\Notifications\CategoryCreatedNotification;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Create the post
        $category = Post::create([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
        ]);

        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            $user->notify(new CategoryCreatedNotification($category));
        }
            return response()->json([
                'success' => 'Category created successfully!',
                'category' => $category,
            ]);

    }


    public function store_old_2(Request $request)
    {
        // Validate the request
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Create the post
        $category = Post::create([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
        ]);

        $roleName = 'user';
        event(new CategoryCreatedRole($category, $roleName));

            return response()->json([
                'success' => 'Category created successfully!',
                'category' => $category,
            ]);

    }


    public function store_old(Request $request)
    {
        // Validate the request
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Create the post
        $category = Post::create([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
        ]);



        // Find Masud R user
        $user = User::where('id', 3)->first();

        event(new CategoryCreated($category, $user->id));

            return response()->json([
                'success' => 'Category created successfully!',
                'category' => $category,
            ]);

    }

}
