<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        Comment::create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return redirect()->route('feed')
            ->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        // Check if user owns the comment
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->route('feed')
            ->with('success', 'Comment deleted successfully!');
    }
}
