<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserFollowed;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user) {
        auth()->user()->toggleFollow($user);
        if(auth()->user()->following($user)) {
            $user->notify(new UserFollowed(auth()->user()));
        }
        return back();
    }
}
