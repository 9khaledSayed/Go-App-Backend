<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Provider;
use App\User;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'type' => 'required'
        ]);
        dd('sdaf');

        if ($request->type == 'user'){

            $user = User::create($this->userValidator($request));
            return $user;

        }else{

            $provider = Provider::create($this->providerValidator($request));
            return $provider;

        }
    }

    public function userValidator(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function providerValidator(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:providers',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
