<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function store(Post  $post) {
        $post->like(currentUser());
        return back();
    }

    public function destroy(Post $post) {
        $post->dislike(currentUser());
        return back();
    }
}
