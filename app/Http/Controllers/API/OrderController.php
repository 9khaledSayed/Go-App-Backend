<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Order;
use App\Provider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function offers(Order $order)
    {
        $offers = $order->offers->map(function ($offer) use ($order){
            $category = $order->category;
            return [
              'id' => $offer->id,
              'category' => $category->name,
              'provider' => $offer->provider->name,
              'price' => $offer->price,
              'offer_description' => $offer->description,
              'order_details' => $order->details,
              'category_images' => $category->images,
              'duration' => $offer->duration,
              'status' => $offer->status,
              'delivery_price' => $offer->delivery_price,
              'order_notes' => $order->notes,
            ];
        });
        return response($offers);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
           'category_id' => 'required' ,
//           'notes' => 'required' ,
           'details' => 'required' ,
        ]);

        $data['user_id'] = auth('user-api')->id();

        Order::create($data);

        $order = auth('user-api')->user()->orders()->latest()->first();

        $response = [
            'id' => $order['id'],
            'category_id' => $order['category_id'],
            'user_id' => $order['user_id'],
            'notes' => $order['notes'],
            'details' => $order['details'],
            'categoryName' => $order['category']['name'],
            'orderDate' => date('d-m-Y' , strtotime($order['created_at'])),
            'status' => $order['status'],
        ];

        return response($response);
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

        $orders = auth()->user()->orders()->where('status', 'in_progress')->get()->map(function ($order){

            $acceptedOffer = $order->offers->where('status','approved')->first();
//            $acceptedDate      = $acceptedOffer->accepted_date->addDays();
            $daysLeft = 0;
            if ($acceptedOffer->end_date->gt(Carbon::now())){
                $daysLeft      = $acceptedOffer->end_date->diffInDays( Carbon::now() );
            }


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
                'provider_id' => $acceptedOffer['provider']['id'],
                'totalDays' => intval( $acceptedOffer['duration'] ),
                'daysLeft' => $acceptedOffer['duration'] - $daysLeft,
            ];
        });

        return response($orders);
    }

    public function pendingOrders(Request $request)
    {

        $orders = auth()->user()->orders()->where('status', 'pending')->get()->map(function ($order){
            return
                [
                    'id' => $order['id'],
                    'category_id' => $order['category_id'],
                    'user_id' => $order['user_id'],
                    'notes' => $order['notes'],
                    'details' => $order['details'],
                    'categoryName' => $order['category']['name'],
                    'orderDate' => $order->created_at,
                    'status' => $order->status,
                ];
        });


        return response($orders);
    }

    public function finishedOrders()
    {

        $orders = auth()->user()->offers()->where('status', 'approved')
            ->whereHas('order', function ($order) {

                $order->where('status', 'finished');

            })->get()->map(function ($offer) {

                return
                    [
                        'id' => $offer['order']['id'],
                        'category_id' => $offer['order']['category_id'],
                        'user_id' => $offer['order']['user_id'],
                        'notes' => $offer['order']['notes'],
                        'details' => $offer['order']['details'],
                        'categoryName' => $offer['order']['category']['name'],
                        'orderDate' => date('d-m-Y', strtotime($offer['order']['created_at'])),
                        'status' => $offer['order']['status'],
                    ];
            });

        return response($orders);
    }


    public function workshop()
    {
        $orders = Order::latest()->where('status', 'pending')->get()->map(function ($order){
            return
                [
                    'id' => $order['id'],
                    'category_id' => $order['category_id'],
                    'user_id' => $order['user_id'],
                    'notes' => $order['notes'],
                    'details' => $order['details'],
                    'categoryName' => $order['category']['name'],
                    'orderDate' => $order->created_at,
                    'category_images' => $order->category->images,
                    'user_name' => $order->user->name,
                    'status' => $order->status,
                ];
        });


        return response($orders);
    }

    public function myInProgressOrders(Request $request)
    {
        $provider = auth()->user();

        $myInProgressOrders = $provider->offers->where('status', 'approved')->map(function ($offer){
            $order = $offer->order;
            if($order->status == 'in_progress'){
                return [
                    'id' => $order['id'],
                    'category_id' => $order['category_id'],
                    'user_id' => $order['user_id'],
                    'notes' => $order['notes'],
                    'details' => $order['details'],
                    'categoryName' => $order['category']['name'],
                    'orderDate' => $order->created_at,
                    'category_images' => $order->category->images,
                    'user_name' => $order->user->name,
                ];
            }

        })->filter();

        return response($myInProgressOrders);
    }
}
