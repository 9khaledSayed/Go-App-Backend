<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $title;
    public $url;
    public $timeAgo;

    public function __construct($notificationID , $title,$timeAgo,$url)
    {
        $this->id       = $notificationID;
        $this->title    = $title;
        $this->url      = $url;
        $this->timeAgo  = $timeAgo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function broadcastOn()
    {
        return ['newOrderChannel'];
    }

    public function broadcastAs()
    {
        return 'OrderEvent';
    }
}
