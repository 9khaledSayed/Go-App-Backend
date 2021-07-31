<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Notifications\NewOrder;
use App\Service;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function userNotifications()
    {
        $notifications = auth()->user()->notifications->map(function ($notification){
            return [
                'id' => $notification->id,
                'body' => $notification->data['title'],
                'created_at' => $notification->created_at->diffForHumans(),
                'read_at' => $notification->read_at,
            ];
        });
        return response($notifications, 200);
    }
    public function providerNotifications()
    {
        auth()->user()->notify(new NewOrder('hello this is a test notification', '2020-10-10', '/'));
        $notifications = auth()->user()->notifications->map(function ($notification){
            return [
                'id' => $notification->id,
                'body' => $notification->data['title'],
                'created_at' => $notification->created_at->diffForHumans(),
                'read_at' => $notification->read_at,
            ];
        });
        return response($notifications, 200);
    }

    public function markUserNotificationAsRead($notificationId)
    {
        auth()->user()->notifications->where('id', $notificationId)->first()->markAsRead();

        return response(['message' => 'Notification has been read successfully"'], 200);

    }

    public function markProviderNotificationAsRead($notificationId)
    {
        auth()->user()->notifications->where('id', $notificationId)->first()->markAsRead();

        return response(['message' => 'Notification has been read successfully"'], 200);
    }

}
