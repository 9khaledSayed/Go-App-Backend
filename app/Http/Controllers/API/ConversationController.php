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

        $isUser   = request()->segment(2) == 'user';

        $authType = $isUser ? 'App\User' : 'App\Provider';

        $response = auth()->user()->conversations->map( function ($conversation) use ($authType , $isUser)
        {
            $recentMessage = $conversation->messages->count() > 0 ? $conversation->messages()->latest()->first()->message : '';
            $timeAgo       = $conversation->messages->count() > 0 ? $conversation->messages()->latest()->first()->created_at->diffForHumans() : '';
            return
            [
                'conversation_id' => $conversation->id,
                'user_id'         => $conversation->user->id,
                'provider_id'     => $conversation->provider->id,
                'receiver_name'   => $isUser ? $conversation->provider->name: $conversation->user->name,
                'receiver_photo'  => $isUser ? $conversation->provider->photo: $conversation->user->photo,
                'receiver_id'     => $isUser ? $conversation->provider->id: $conversation->user->id,
                'recent_message'  => $recentMessage,
                'time_ago'        => $timeAgo,
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
        $isUser   = request()->segment(2) == 'user';
        $authType = $isUser ? 'App\User' : 'App\Provider';

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
          'receiver_name'   => $isUser ? $conversation->provider->name : $conversation->user->name,
          'receiver_photo'  => $isUser ? $conversation->provider->photo : $conversation->user->photo,
          'receiver_id'     => $isUser ? $conversation->provider->id : $conversation->user->id,
          'messages'        => $messages,
        ];

        return response()->json($response);
    }
}
