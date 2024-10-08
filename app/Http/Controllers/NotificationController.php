<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationSent;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Crear y disparar el evento
        event(new NotificationSent($request->input('message')));

        return response()->json(['status' => 'Notification sent!']);
    }
}
