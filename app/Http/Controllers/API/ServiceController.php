<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::get();
        return response($services);
    }
}
