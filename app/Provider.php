<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Provider extends Authenticatable
{
    use HasApiTokens, Notifiable,SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token', 'photo', 'updated_at', 'created_at', 'deleted_at', 'payment_method_id'
    ];

    protected $appends = ['photo_url'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function getPhotoUrlAttribute()
    {
        return asset(getImagesPath('Users') . $this->attributes['photo']);
    }
}
