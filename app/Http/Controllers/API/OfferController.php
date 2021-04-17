<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Service;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function show(Offer $offer)
    {
        $order = $offer->order;
        $category = $order->category;
        return response()->json([
            'id' => $offer->id,
            'category' => $category->name,
            'provider' => $offer->provider->name,
            'price' => $offer->price,
            'offer_description' => $offer->description,
            'order_details' => $order->details,
            'category_images' => $category->images,
            'status' => $offer->status,
        ]);
    }

    public function accept(Offer $offer)
    {
        $offer->status = "approved";
        $offer->save();

        $order = $offer->order;
        $order->status = "underway";
        $order->save();

        return response()->json([
            'status' => true,
            'message' => "The offer has been approved",
        ]);
    }
}
