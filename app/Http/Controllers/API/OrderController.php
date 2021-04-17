<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Order;
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
}
