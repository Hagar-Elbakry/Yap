<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show(User $user) {
        return view('profile.show', compact('user'));
    }
    public function edit(User $user)
    {
        Gate::authorize('edit', $user);
        return view('profile.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $user) {
        Gate::authorize('edit', $user);
        $attributes = $request->validated();

        if($request->hasFile('avatar')) {
            if($user->getRawOriginal('avatar')) {
                Storage::delete($user->getRawOriginal('avatar'));
            }
            $attributes['avatar'] = $request->get('avatar')->store('avatars');
        }
        if($request->hasFile('banner')) {
            if($user->getRawOriginal('banner')) {
                Storage::delete($user->getRawOriginal('banner'));
            }
            $attributes['banner'] = $request->get('banner')->store('banners');
        }

        if(request('bio')) {
            $attributes['bio'] = $request->get('bio');
        }
        $user->update($attributes);

        return redirect($user->path());
    }

}
