<?php

namespace App;

use App\Conversation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'photo', 'updated_at', 'created_at', 'deleted_at', 'payment_method_id'
    ];

    protected $appends = ['photo_url'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'allow_offers' => 'boolean',
        'allow_notifications' => 'boolean',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('id','desc');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class,'user_id')->orderBy('id','desc');
    }

    public function getPhotoUrlAttribute()
    {
        return asset(getImagesPath('Users') . $this->photo);
    }
}
