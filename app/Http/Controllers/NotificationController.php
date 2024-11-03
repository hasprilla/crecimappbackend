<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationSent;
use Pusher\Pusher;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );

        $data['message'] = $request->input('message');
        $pusher->trigger('chat', 'my-event', $data);

        return response()->json(['status' => 'Notification sent']);

        // $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);

        // // Crear y disparar el evento
        // event(new NotificationSent($request->input('message')));

        // return response()->json(['status' => 'Notificatiohhhn sent!']);
    }
}
