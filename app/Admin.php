<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $guard = 'admin';
    protected $guarded = [];
    public $rules   =
    [
        'name'=>'required | min:3',
        'email'  =>'required | email | unique:admins',
        'password' => 'required|confirmed|min:6',
    ];




}
