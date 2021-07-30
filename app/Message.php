<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $guarded = [];
    protected $casts   =
    [
        'created_at' => 'datetime:Y-m-d',
        'conversation_id' => 'integer',
    ];


    public function sender()
    {
        return $this->morphTo();
    }

}
