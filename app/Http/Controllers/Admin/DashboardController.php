<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke() {
        $totalUsers = User::count();
        $totalPosts = Post::count();
        return view('admin.dashboard', compact('totalUsers', 'totalPosts'));
    }
}
