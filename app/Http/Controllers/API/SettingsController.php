<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function saveUserSettings(Request $request)
    {
        auth()->user()->update($request->validate([
           'allow_notifications' => 'required|boolean',
           'allow_offers' => 'required|boolean'
        ]));

        return response(['message' => 'settings saved successfully', 'user' => auth()->user()], 200);
   }

    public function saveProviderSettings(Request $request)
    {
        auth()->user()->update($request->validate([
           'allow_notifications' => 'required|boolean',
        ]));

        return response(['message' => 'settings saved successfully', 'user' => auth()->user()], 200);
   }
}
