<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserNotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/posts', 'as' => 'posts.', 'middleware' => 'auth'], function () {
    Route::get('',[PostController::class,'index'])->name('index');
    Route::post('',[PostController::class,'store'])->name('store');
    Route::delete('/{post}',[PostController::class,'destroy'])->name('destroy');
    Route::post('/{post}/like', [PostLikesController::class, 'store'])->name('like');
    Route::delete('/{post}/like', [PostLikesController::class, 'destroy'])->name('dislike');
});

Route::middleware('auth')->group(function () {


    Route::get('/profile/{user:username}',[ProfileController::class,'show'])->name('profile');
    Route::post('/profile/{user:username}/follow', [FollowController::class,'store'])->name('follow');
    Route::get('/profile/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user:username}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/explore',[ExploreController::class,'index'])->name('explore');

    Route::get('/notifications', [UserNotificationController::class, 'show'])->name('notifications');

});

require __DIR__.'/auth.php';
