<?php

namespace App\Http\Controllers\Dashboard;

use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {

        if ($request->ajax())
        {

            $paymentMethods = PaymentMethod::all();
            return response()->json(["data" => $paymentMethods]);

        }

        return view('dashboard.payment-methods.index');
    }

    public function create()
    {

        return view('dashboard.payment-methods.create');
    }





    public function edit(PaymentMethod $paymentMethod)
    {
        return view('dashboard.payment-methods.edit',compact('paymentMethod'));
    }


    public function show(PaymentMethod $paymentMethod)
    {
        return view('dashboard.payment-methods.show',compact('paymentMethod'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name'=>'required | min:3 | unique:paymentMethods',
            'image'  =>'nullable | mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        PaymentMethod::create($data);


        return redirect()->route('dashboard.payment-methods.index')->with('message','تم إضافه مشرف بنجاج');
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {


        $data = $request->validate([
            'name'=>'required | min:3',
            'email'  =>'required | email | unique:paymentMethods,id,' . $paymentMethod->id,
        ]);

        $paymentMethod->update($data);

        return redirect()->route('dashboard.payment-methods.index')->with('message','تم تعديل بيانات المشرف بنجاج');

    }

    public function destroy(Request $request, $id)
    {

        if($request->ajax())
        {
            if ($id != 1)
            {
                PaymentMethod::find($id)->destroy($id);
            }else
            {
                return response()->json([
                    'message' => 'لا يمكن حذف هذا المشرف'
                ],422);
            }

        }
    }
}
