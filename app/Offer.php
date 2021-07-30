<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'accepted_date' => 'date: Y-m-d',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    protected static function booted()
    {

        static::created(function ($offer)
        {
//            $orderUrl = "/dashboard/offers/" . $offer->id;
//            $title    = "يوجد طلب جديد من العميل " . $offer->user->name;
//            $timeAgo  = 'منذ ' . Carbon::parse($offer->created_at)->diffForHumans();
//            $admin    =  Admin::first();
//
//            $admin->notify( new NewOrder($title , $timeAgo , $orderUrl));
//            $notificationID = Notification::all()->last()->id;
//            event( new NewOrderEvent($notificationID,$title , $timeAgo, $orderUrl));

            // tell the user about this new offer
            sendFirebaseNotification("User",'يوجد عرض جديد علي طلبك رقم ' . $offer->order->id ,$offer->order->user_id);
        });

    }

    public function getEndDateAttribute()
    {
        return $this->accepted_date->addDays($this->attributes['duration']);
    }
}
