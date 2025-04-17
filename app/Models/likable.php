<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Builder;

trait likable {

    public function scopeWithLikes(Builder $query) {
        $query->leftJoinSub(
            'SELECT post_id, sum(`like`) likes, sum(!`like`) dislike FROM likes GROUP BY post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function like($like, $user = null) {
         $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ],[
            'like' => $like
        ]);
    }

    public function dislike($user = null) {
          $this->like($user, false);
    }

    public function isLikedBy(User $user) {
        return (bool) $user->likes->where('post_id', $this->id)->where('like', true)->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $user->likes->where('post_id', $this->id)->where('like', false)->count();
    }
}
