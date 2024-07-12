<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class WebCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user', 'post')->get();
        return view('dashboard.comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        if ($comment->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }
        return view('layouts.editcomment', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to update this comment.');
        }

        $request->validate([
            'body' => 'required|string',
        ]);

        $comment->update([
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
