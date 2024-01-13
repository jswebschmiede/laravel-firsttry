<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        // Create the post
        Post::create([
            'title' => $incomingData['title'],
            'body' => $incomingData['body'],
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('home');
    }
}
