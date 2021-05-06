<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifictionController extends Controller
{
    public function markAsRead(Request $request)
    {
        $id            = $request['id'];
        $notifictaions =  Admin::first()->notifications();
        $notifictaions->find($id)->markAsRead();
    }
}
