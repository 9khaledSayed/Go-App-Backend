<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Provider extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = [];
}
