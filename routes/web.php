<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserNotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => '/posts', 'as' => 'posts.', 'middleware' => 'auth'], function () {
    Route::get('',[PostController::class,'index'])->name('index');
    Route::get('/{post}',[PostController::class,'show'])->name('show');
    Route::post('',[PostController::class,'store'])->name('store');
    Route::delete('/{post}',[PostController::class,'destroy'])->name('destroy');
    Route::post('/{post}/like', [PostLikesController::class, 'store'])->name('like');
    Route::delete('/{post}/like', [PostLikesController::class, 'destroy'])->name('dislike');
});

Route::group(['prefix' => '/profile', 'as' => 'profile.', 'middleware' => 'auth'], function () {
    Route::get('/{user:username}',[ProfileController::class,'show'])->name('show');
    Route::post('/{user:username}/follow', [FollowController::class,'store'])->name('follow');
    Route::get('/{user:username}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/{user:username}', [ProfileController::class, 'update'])->name('update');
});

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('',DashboardController::class)->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
});

Route::middleware('auth')->group(function () {

    Route::get('/explore',[ExploreController::class,'index'])->name('explore');

    Route::get('/notifications', [UserNotificationController::class, 'show'])->name('notifications');
});




require __DIR__.'/auth.php';
