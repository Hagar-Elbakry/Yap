<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostReacted;

class PostLikesController extends Controller
{
    public function store(Post  $post) {
        $post->toggleLike(currentUser());
        if($post->isLikedBy(currentUser())) {
            $user = $post->user()->first();
            $user->notify(new PostReacted($post, currentUser() ,'like'));
        }
        return back();
    }

    public function destroy(Post $post) {
        $post->toggleDislike(currentUser());
        if($post->isDislikedBy(currentUser())) {
            $user = $post->user()->first();
            $user->notify(new PostReacted($post, currentUser(), 'dislike'));
        }
        return back();
    }
}
