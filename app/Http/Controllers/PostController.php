<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('feed',['posts' => $posts]);
    }
    public function createPost(Request $request){
        $validated = $request->validate([
            'content' => 'required|min:10',
            'user_id' => 'required'
        ]);

        $post = Post::create($validated);
        return redirect()->route('feed');
    }

    public function deletePost(Post $post){
        if (Auth::id() !== $post->user_id) {
            abort(403, 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('feed')
            ->with('success', 'Post deleted successfully!');
    }
}
