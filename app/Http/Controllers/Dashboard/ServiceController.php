<?php

namespace App\Http\Controllers\Dashboard;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()){
            $services = Service::get();
            return response()->json($services);
        }
        return view('dashboard.services.index');
    }

    public function create()
    {
        return view('dashboard.services.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255,unique:services',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:255',
            'color' => 'required|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = uploadImage($request->file('logo'), "Services");
        }

        Service::create($data);

        return redirect(route('dashboard.services.index'))->with('message', 'تم اضافة الخدمة بنجاح');
    }


    public function show(Service $service)
    {
        return view('dashboard.services.show', compact('service'));
    }


    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }


    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required|max:255,unique:services,'. $service->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:255',
            'color' => 'required|max:255',
        ]);

        if ($request->hasFile('logo')) {
            deleteImage($service->logo, 'Services');
            $data['logo'] = uploadImage($request->file('logo'), "Services");
        }

        $service->update($data);
        return redirect(route('dashboard.services.index'))->with('message', 'تم تعديل الخدمة بنجاح');
    }


    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Item Deleted Successfully'
        ]);
    }
}
