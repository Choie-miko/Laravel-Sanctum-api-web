<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class WebPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments')->get();
        return view('layouts.dashboard', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $post);
    }


}
