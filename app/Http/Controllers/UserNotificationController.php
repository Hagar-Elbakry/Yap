<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function show() {
        return view('notifications.show',[
            'notifications' => auth()->user()->notifications()->paginate(20)
        ]);
    }
}
