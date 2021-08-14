<?php

namespace App;

use App\Events\NewOrderEvent;
use App\Notifications\NewOrder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Integer;

class Order extends Model
{
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $appends = ['file_path','status_name'];

    protected $guarded = [];

    public function getCategoryIdAttribute()
    {
        return intval($this->attributes['category_id']);
    }

    public function getUserIdAttribute()
    {
        return intval($this->attributes['user_id']);
    }

    public function getStatusNameAttribute()
    {
        switch ( $this->attributes['status'] )
        {
            case "pending"     : return "جديدة";
            case "in_progress" : return "تحت النفيذ";
            case "finished"    : return "تم النفيذ";
            case "canceled"    : return "تم الإلغاء";
        }
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {

        static::created(function ($order)
        {
            $orderUrl = "/dashboard/orders/" . $order->id;
            $title    = "يوجد طلب جديد من العميل " . $order->user->name;
            $timeAgo  = 'منذ ' . Carbon::parse($order->created_at)->diffForHumans();
            $admin    =  Admin::first();

//            $admin->notify( new NewOrder($title , $timeAgo , $orderUrl));
//            $notificationID = Notification::all()->last()->id;
//            event( new NewOrderEvent($notificationID,$title , $timeAgo, $orderUrl));

            // tell all the providers about the new order
            sendFirebaseNotification("Provider",'يوجد طلب جديد');
        });

    }

    public function getFilePathAttribute()
    {
        if ($this->file){
            return getImagesPath('Orders') . $this->file;
        }

        return $this->file;
    }

}
