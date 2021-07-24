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
           'photo' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:10000',
           'password' => 'nullable|min:8',
        ]);

        if (isset($request->password)){
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data['password']);
        }

        if($request->hasFile('photo'))
        {
            deleteImage(auth()->user()->photo , "Users");
            $data['photo'] = uploadImage($request->file('photo'), "Users");
        }


        auth()->user()->update($data);

        $response = ['user' => auth()->user()];

        return response($response, 200);
    }

    public function storeProviderInfo(Request $request)
    {
        $data = $request->validate([
           'name' => 'required|string|max:191',
           'email' => 'required|email|unique:providers,id,' . auth()->id(),
           'phone' => 'required|unique:providers,id,' . auth()->id(),
           'photo' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:10000',
           'password' => 'nullable|min:8',
        ]);

        if (isset($request->password)){
            $data['password'] = Hash::make($request->password);
        }else{
            unset($data['password']);
        }

        if($request->hasFile('photo'))
        {
            deleteImage(auth()->user()->photo , "Providers");
            $data['photo'] = uploadImage($request->file('photo'), "Providers");
        }

        auth()->user()->update($data);

        $response = ['user' => auth()->user()];

        return response($response, 200);
    }
}
