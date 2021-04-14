<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all()->map( function ($service){
            return
            [
                "id" => $service['id'],
                "name" => $service['name'],
                "logo" => 'http://192.168.1.15:8000/storage/Images/Services/' .$service['logo'],
                "description" => $service['description'],
            ];
        });
        return response($services);
    }
}
