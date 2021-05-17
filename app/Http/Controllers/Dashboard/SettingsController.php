<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function showGeneralSettings()
    {
        return view('dashboard.settings.general');
    }
    public function saveGeneralSettings(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'twitter_link' => 'required|string|regex:/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/',
        ]);

        setting($data)->save();


        return redirect()->back()->with('message', 'تم الحفظ بنجاح');
    }
}
