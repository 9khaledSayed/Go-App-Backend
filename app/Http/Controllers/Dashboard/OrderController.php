<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public $statusNames =
    [
        'pending'     => 'قيد الأنتظار',
        'in_progress' => 'قيد التنفيذ',
        'finished'    => 'تم الأنتهاء',
        'canceled'    => 'تم الألغاء',
    ];

    public function index(Request $request)
    {


        if ($request->ajax()){
            $orders = Order::with('category','user','offers')->get()->map( function ($order)  {
                return
                [
                  'id'            => $order['id'],
                  'user_name'     => $order['user']['name'],
                  'category_name' => $order['category']['name'],
                  'notes'         => $order['notes'],
                  'no_offers'     => count($order['offers']),
                  'status'        => $this->statusNames[ $order['status'] ]
                ];

                });
            return response()->json($orders);
        }
        return view('dashboard.orders.index');
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show',compact('order'));

    }

}
