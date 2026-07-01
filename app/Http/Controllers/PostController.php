<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
}
