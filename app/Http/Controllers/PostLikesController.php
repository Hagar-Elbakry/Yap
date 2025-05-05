<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function store(Post  $post) {
        $post->toggleLike(currentUser());
        return back();
    }

    public function destroy(Post $post) {
        $post->toggleDislike(currentUser());
        return back();
    }
}
