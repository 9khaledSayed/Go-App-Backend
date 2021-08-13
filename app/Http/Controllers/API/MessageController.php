<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    public function store(Request $request)
    {

        $data = $request->validate([
            'conversation_id' => 'required',
            'message' => 'required',
        ]);

        $data['sender_id'] = auth()->id();
        $data['sender_type'] = auth('user-api')->check() ? 'App\User' : 'App\Provider';

        Message::create($data);

        $modelName   = auth('user-api')->check() ? 'Provider' : 'User';
        $modelObject = app("App\\$modelName");



        sendFirebaseNotification( $modelName , $request['message'] , $request['receiver_id']);

        return response()->json([
            'status' => true,
            'message' => 'sent successfully',
            'result' => $request['receiver_id']
        ]);
    }


    public function destroy(Message $message)
    {
        //
    }
}
