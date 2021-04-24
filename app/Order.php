<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];

    protected $guarded = [];

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
}
