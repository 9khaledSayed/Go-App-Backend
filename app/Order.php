<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
