<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{

    public function userLogin (Request $request) {
        $request->validate([
            'email' => 'required|string|email|max:255||exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token, 'user' => $user];
            return response($response, 200);
        } else {
            $response = ["message" => "Password mismatch"];
            return response($response, 422);
        }
    }
    public function providerLogin (Request $request) {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:providers,email',
            'password' => 'required|string|min:6',
        ]);

        $provider = Provider::where('email', $request->email)->first();
        if (Hash::check($request->password, $provider->password)) {
            $token = $provider->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token, 'user' => $provider];
            return response($response, 200);
        } else {
            $response = ["message" => "Password mismatch"];
            return response($response, 422);
        }
    }

    public function register (Request $request) {
        $request->validate([
            'type' => 'required'
        ]);

        if ($request->type == 'user'){

            $user = User::create($this->userValidator($request));
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        }else{

            $provider = Provider::create($this->providerValidator($request));
            $token = $provider->createToken('Laravel Password Grant Client')->accessToken;
        }

        $response = ['token' => $token];

        return response($response, 200);
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    public function userValidator(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password']=Hash::make($request['password']);
        $data['remember_token'] = Str::random(10);

        return $data;
    }

    public function providerValidator(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:providers',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $data['password']=Hash::make($request['password']);
        $data['remember_token'] = Str::random(10);

        return $data;
    }

}
