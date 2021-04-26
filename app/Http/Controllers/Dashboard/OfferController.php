<?php

namespace App\Http\Controllers\Dashboard;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()){
            $offers = Offer::with(['provider', 'order'])->get();
            return response()->json($offers);
        }
        return view('dashboard.offers.index');
    }

    public function show(Offer $offer)
    {
        return view('dashboard.offers.show' , compact('offer'));
    }
}
