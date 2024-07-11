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

//    public function store(Request $request)
//    {
//        $request->validate([
//            'post_id' => 'required|exists:posts,id',
//            'body' => 'required|string',
//        ]);
//
//        $comment = Comment::create([
//            'post_id' => $request->post_id,
//            'user_id' => auth()->id(),
//            'body' => $request->body,
//        ]);
//
//        return redirect()->back()->with('success', 'Comment added successfully.');
//    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(), // Associate the authenticated user ID with the comment
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
