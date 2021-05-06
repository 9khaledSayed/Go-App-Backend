<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table =  "notifications";

    public function getIdAttribute()
    {
        return json_decode($this->attributes['data'])->id;
    }
}
