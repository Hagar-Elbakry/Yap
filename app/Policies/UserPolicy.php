<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit($currentUser, User $user) {
        return $currentUser->is($user);
    }
}
