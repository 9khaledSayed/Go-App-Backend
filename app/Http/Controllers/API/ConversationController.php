<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{

    public function index()
    {
        $authType = auth('user-api')->check() ? 'App/User' : 'App/Provider';

        $response = auth()->user()->conversations->map( function ($conversation) use ($authType)
        {
            return
            [
                'conversation_id' => $conversation->id,
                'user_id'         => $conversation->user->id,
                'provider_id'     => $conversation->provider->id,
                'receiver_name'   => $conversation->provider->name,
                'receiver_photo'  => $conversation->provider->photo,
                'messages'        => $conversation->messages->map( function ($message) use ($authType)
                {
                    return
                    [
                        'message' => $message->message,
                        'sender'  => $message->sender->name,
                        'date' => $message->created_at,
                        'is_mine' => $authType == $message->sender_type
                    ];
                }),
            ];
        });

        return response()->json($response);
    }


    public function store(Request $request)
    {

        $authType = auth('user-api')->check() ? 'App/User' : 'App/Provider';

        $conversation = Conversation::firstOrCreate([
            'user_id' => $request['user_id'] ,
            'provider_id' => $request['provider_id'] ,
        ]);

         $messages = $conversation->messages->map( function ($message) use ($authType)
         {
             return
                 [
                     'message' => $message->message,
                     'sender'  => $message->sender->name,
                     'date' => $message->created_at,
                     'is_mine' => $authType == $message->sender_type

                 ];
         });


        $response = [
          'conversation_id' => $conversation->id,
          'receiver_name'   => $conversation->provider->name,
          'receiver_photo'  => $conversation->provider->photo,
          'messages'        => $messages,
        ];

        return response()->json($response);
    }
}
