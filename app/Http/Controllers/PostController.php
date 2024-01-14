<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('post.create');
    }

    public function store(Request $request): RedirectResponse
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

        return redirect()->route('dashboard');
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $incomingData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        // Update the post
        $post->update([
            'title' => $incomingData['title'],
            'body' => $incomingData['body']
        ]);

        return redirect()->route('dashboard');
    }
}
