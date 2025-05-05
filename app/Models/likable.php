<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Builder;

trait likable {

    public function scopeWithLikes(Builder $query) {
        $query->leftJoinSub(
            'SELECT post_id, sum(liked) likes, sum(!liked) dislikes FROM likes GROUP BY post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $like = true) {
         $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ],[
            'liked' => $like
        ]);
    }

    public function dislike($user = null) {
          $this->like($user,false);
    }

  public function toggleLike($user = null) {
        $existing = $this->likes()->where('user_id', $user ? $user->id : auth()->id())->first();

        if($existing) {
            $existing->delete();
        } else {
            $this->like($user);
        }
  }

    public function toggleDislike($user = null) {
        $existing = $this->likes()->where('user_id', $user ? $user->id : auth()->id())->first();

        if($existing) {
            $existing->delete();
        } else {
            $this->dislike($user);
        }
    }

    public function isLikedBy(User $user) {
        return (bool) $user->likes->where('post_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $user->likes->where('post_id', $this->id)->where('liked', false)->count();
    }
}
