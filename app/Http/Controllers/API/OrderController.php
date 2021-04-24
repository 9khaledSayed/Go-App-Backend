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
                'status' => $order['status'],
            ];
        });
        return response($orders);
    }


    public function inProgressOrders()
    {

        $orders = auth()->guard('user-api')->user()->orders->where('status','in_progress')->map(function ($order){

            $acceptedOffer = $order->offers->where('status','approved')->first();
            $daysLeft      = new Carbon( $acceptedOffer['accepted_date'] );
            $daysLeft      = $daysLeft->diffInDays( Carbon::now() );

            return
            [
                'id' => $order['id'],
                'category_id' => $order['category_id'],
                'user_id' => $order['user_id'],
                'notes' => $order['notes'],
                'details' => $order['details'],
                'categoryName' => $order['category']['name'],
                'orderDate' => date('d-m-Y' , strtotime($order['created_at'])),
                'status' => $order['status'],
                'provider_name' => $acceptedOffer['provider']['name'],
                'totalDays' => $acceptedOffer['duration'],
                'daysLeft' => $acceptedOffer['duration'] - $daysLeft,
            ];
        });
        return response($orders);
    }


    public function finishedOrders()
    {

        $orders = auth()->guard('provider-api')->user()->offers()->where('status','approved')
            ->whereHas('order' , function ($order){

              $order->where('status','finished');

        })->get()->map(function ($offer){

                return
                    [
                        'id' => $offer['order']['id'],
                        'category_id' => $offer['order']['category_id'],
                        'user_id' => $offer['order']['user_id'],
                        'notes' => $offer['order']['notes'],
                        'details' => $offer['order']['details'],
                        'categoryName' => $offer['order']['category']['name'],
                        'orderDate' => date('d-m-Y' , strtotime($offer['order']['created_at'])),
                        'status' => $offer['order']['status'],
                    ];


        });
        return response($orders);
    }
}
