<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
class CommentController extends Controller
{
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
        return response()->json($comment, 201);
    }
    public function update(Request $request, Comment $comment)
    {

        if (auth()->id() !== $comment->user_id) {

            return response()->json(['error' => 'You are not authorized to update this comment.'], 403);
        }


        $request->validate([
            'body' => 'sometimes|string',
        ]);

        
        $comment->update($request->only('body'));


        return response()->json($comment);
    }


    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            return response()->json(['error' => 'You are not authorized to delete this comment.'], 403);
        }

        $comment->delete();

        return response()->json(null, 204);
    }


//    public function showComments(Comment $comment)
//    {
//        return $comment->load('post', 'comments');
//    }
}
