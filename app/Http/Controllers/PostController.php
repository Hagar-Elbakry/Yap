<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use AuthorizesRequests;
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
    public function store(PostStoreRequest $request, Post $post) {
        $attributes = $request->validated();

        Post::create([
            'body' => $attributes['body'],
            'user_id' => auth()->id()
        ]);

        return redirect(route('posts.index'));
    }

    public function destroy(Post $post) {
        $this->authorize('post.delete', $post);
        $post->delete();
        return redirect(route('posts.index'));
    }
}
