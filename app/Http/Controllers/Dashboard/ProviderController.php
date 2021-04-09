<?php

namespace App\Http\Controllers\Dashboard;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {

        if ($request->ajax())
        {

            $providers = Provider::all();
            return response()->json(["data" => $providers]);

        }

        return view('dashboard.providers.index');
    }



    public function show(Provider $provider)
    {
        return view('dashboard.providers.show',compact('provider'));
    }



    public function destroy(Request $request, $id)
    {

        if($request->ajax())
        {

            return response()->json([
                'message' => 'لا يمكن حذف هذا المشرف'
            ],422);

        }
    }
}
