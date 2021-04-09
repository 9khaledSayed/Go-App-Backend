<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()){
            $orders = Order::get();
            return response()->json($orders);
        }
        return view('dashboard.orders.index');
    }

    public function show(Order $order)
    {
        //
    }

}
