<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function offers(Order $order)
    {
        $offers = $order->offers->map(function ($offer) use ($order){
            return [
              'id' => $offer->id,
              'category' => $order->category->name,
              'provider' => $offer->provider->name,
              'price' => $offer->price,
              'status' => $offer->status,
            ];
        });
        return response($offers);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
           'category_id' => 'required' ,
           'notes' => 'required' ,
           'details' => 'required' ,
        ]);

        $data['user_id'] = auth('user-api')->id();

        $order = Order::create($data);

        return response($order);
    }

    public function index()
    {

        $orders = auth()->guard('user-api')->user()->orders->map(function ($order){
            return
            [
                'id' => $order['id'],
                'category_id' => $order['category_id'],
                'user_id' => $order['user_id'],
                'notes' => $order['notes'],
                'details' => $order['details'],
                'categoryName' => $order['category']['name'],
                'orderDate' => date('d-m-Y' , strtotime($order['created_at'])),
            ];
        });
        return response($orders);
    }
}
