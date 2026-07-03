<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('feed',['posts' => $posts]);
    }
    public function createPost(StorePostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('feed')
            ->with('success', 'Your post has been published successfully!');
    }

    public function editPost(UpdatePostRequest $request, $id){
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id) {
            abort(403, 'You are not authorized to update this post.');
        }

        $validated = $request->validated();
        $post->update([
            'content' => $validated['content'],
        ]);

        return redirect()->route('feed')
            ->with('success', 'Post updated successfully!');
    }
    public function deletePost($id){
        $post = Post::findorfail($id);
        if (Auth::id() !== $post->user_id) {
            abort(403, 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('feed')
            ->with('success', 'Post deleted successfully!');
    }
}
