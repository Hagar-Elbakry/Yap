<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts',[PostController::class,'index'])->name('home');
    Route::post('/posts',[PostController::class,'store'])->name('posts.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile/{user:name}',[ProfileController::class,'show'])->name('profile');
    Route::post('/profile/{user:name}/follow', [FollowController::class,'store'])->name('follow');
    Route::get('/profile/{user:name}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
