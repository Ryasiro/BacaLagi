<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->notifications;

        // Tandai semua sebagai telah dibaca
        $user->unreadNotifications->markAsRead();

        return view('user.notifikasi', compact('notifications'));
    }
}
