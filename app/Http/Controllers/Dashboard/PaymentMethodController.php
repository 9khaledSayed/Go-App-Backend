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
            'name'=>'required | min:3 | unique:payment_methods',
            'image'  =>'nullable | mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);


        if($request->hasFile('image'))
        {
            $data['image'] = uploadImage($request->file('image'), "PaymentMethods");
        }

        $data['status'] = $request['status'] == 'on';

        PaymentMethod::create($data);


        return redirect()->route('dashboard.payment-methods.index')->with('message','تم إضافه طريقه دفع جديده بنجاج');
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {

        $data = $request->validate([
            'name'=>'required | min:3 | unique:payment_methods,id,' . $paymentMethod->id,
            'image'  =>'nullable | mimes:jpeg,jpg,png,gif | max:10000',
        ]);

        if($request->hasFile('image'))
        {
            deleteImage($paymentMethod['image'] , "PaymentMethods");
            $data['image'] = uploadImage($request->file('image'), "PaymentMethods");
        }

        $data['status'] = $request['status'] == 'on';

        $paymentMethod->update($data);

        return redirect()->route('dashboard.payment-methods.index')->with('message','تم تعديل بيانات طريقه الدفع بنجاج');

    }

    public function destroy(Request $request, $id)
    {

        if($request->ajax())
        {
            PaymentMethod::find($id)->destroy($id);
        }
    }
}
