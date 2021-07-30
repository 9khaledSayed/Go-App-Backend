<?php

namespace App;


use App\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('id', 'desc');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class , 'provider_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
