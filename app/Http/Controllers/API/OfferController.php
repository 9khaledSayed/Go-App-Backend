<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Service;
use Carbon\Carbon;
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
        $order->accepted_date = Carbon::now()->format('yyyy-mm-d');
        $order->save();

        return response()->json([
            'status' => true,
            'message' => "The offer has been approved",
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|numeric|exists:orders,id',
            'duration' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string'
        ]);
        $data['provider_id'] = auth()->user()->id;

        $offerExists = Offer::where([
            ['order_id', $data['order_id']],
            ['provider_id', $data['provider_id']]
        ])->exists();

        if ($offerExists){
            return response()->json([
                'status' => false,
                'message' => "لقد قمت بالفعل بعمل عرض مسبقا علي هذا الطلب",
            ]);
        }


        Offer::create($data);

        return response()->json([
            'status' => true,
            'message' => "The offer has been created",
        ]);
    }
}
