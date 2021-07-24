<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function storeUserInfo(Request $request)
    {
        $data = $request->validate([
           'name' => 'required|string|max:191',
           'email' => 'required|email|unique:users,id,' . auth()->id(),
           'phone' => 'required|unique:users,id,' . auth()->id(),
           'password' => 'nullable|min:8',
        ]);

        if (isset($request->password)){
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data['password']);
        }

//        if($request->hasFile('image'))
//        {
//            deleteImage($paymentMethod['logo'] , "PaymentMethods");
//            $data['logo'] = uploadImage($request->file('logo'), "PaymentMethods");
//        }


        auth()->user()->update($data);

        $response = ['user' => [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->phone,
            'fcm_token' => auth()->user()->fcm_token,
            'updated_at' => auth()->user()->updated_at,
            'created_at' => auth()->user()->created_at,
        ]];

        return response($response, 200);
    }

    public function storeProviderInfo(Request $request)
    {
        $data = $request->validate([
           'name' => 'required|string|max:191',
           'email' => 'required|email|unique:providers,id,' . auth()->id(),
           'phone' => 'required|unique:providers,id,' . auth()->id(),
           'password' => 'nullable|min:8',
        ]);

        if (isset($request->password)){
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data['password']);
        }

//        if($request->hasFile('image'))
//        {
//            deleteImage($paymentMethod['logo'] , "PaymentMethods");
//            $data['logo'] = uploadImage($request->file('logo'), "PaymentMethods");
//        }


        auth()->user()->update($data);

        $response = ['user' => [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->phone,
            'fcm_token' => auth()->user()->fcm_token,
            'updated_at' => auth()->user()->updated_at,
            'created_at' => auth()->user()->created_at,
        ]];

        return response($response, 200);
    }
}
