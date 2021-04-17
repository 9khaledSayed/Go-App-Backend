<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class , 'service_id');
    }
}
