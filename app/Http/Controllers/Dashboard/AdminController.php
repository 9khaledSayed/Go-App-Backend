<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax())
        {

            $admins = Admin::all();
            return response()->json(["data" => $admins]);

        }

        return view('dashboard.admins.index');
    }

    public function create()
    {

        return view('dashboard.admins.create');
    }





    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit',compact('admin'));
    }


    public function show(Admin $admin)
    {
        return view('dashboard.admins.show',compact('admin'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'=>'required | min:3',
            'email'  =>'required | email | unique:admins',
            'password' => 'required|confirmed|min:6',
        ]);

       Admin::create($data);


        return redirect()->route('dashboard.admins.index')->with('message','تم إضافه مشرف بنجاج');
    }

    public function update(Request $request, Admin $admin)
    {


        $data = $request->validate([
            'name'=>'required | min:3',
            'email'  =>'required | email | unique:admins,id,' . $admin->id,
        ]);

        $admin->update($data);

        return redirect()->route('dashboard.admins.index')->with('message','تم تعديل بيانات المشرف بنجاج');

    }

    public function destroy(Request $request, $id)
    {

        if($request->ajax())
        {
            if ($id != 1)
            {
                Admin::find($id)->destroy($id);
            }else
            {
                return response()->json([
                    'message' => 'لا يمكن حذف هذا المشرف'
                ],422);
            }

        }
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.show-login');
    }

}
