<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index',[
            'posts' => auth()->user()->timeline()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show',[
            'post' => Post::where('id', $post->id)->withLikes()->first()
        ]);
    }
    public function store(Request $request) {
        $attributes = $request->validate([
            'body' => 'required'
        ]);

        Post::create([
            'body' => $attributes['body'],
            'user_id' => auth()->id()
        ]);

        return redirect(route('posts.index'));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect(route('posts.index'));
    }
}
