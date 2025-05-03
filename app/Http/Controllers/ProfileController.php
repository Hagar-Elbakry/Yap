<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

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
    public function update(User $user) {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash' , Rule::unique('users')->ignore($user)],
            'avatar' => ['file', 'mimes:jpeg,png,jpg', 'max:2048'],
            'banner' => ['file', 'mimes:jpeg,png,jpg', 'max:2048'],
            'bio' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if(request('avatar')) {
            if($user->getRawOriginal('avatar')) {
                Storage::delete($user->getRawOriginal('avatar'));
            }
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        if(request('banner')) {
            if($user->getRawOriginal('banner')) {
                Storage::delete($user->getRawOriginal('banner'));
            }
            $attributes['banner'] = request('banner')->store('banners');
        }

        if(request('bio')) {
            $attributes['bio'] = request('bio');
        }
        $user->update($attributes);

        return redirect($user->path());
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
