<?php

namespace App\Http\Controllers;



class UserNotificationController extends Controller
{
    public function show() {
        return view('notifications.show',[
            'notifications' => auth()->user()->notifications()->paginate(20)
        ]);
    }
}
