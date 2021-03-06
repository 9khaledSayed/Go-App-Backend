<?php

namespace App\Http\Controllers\Dashboard;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()){
            $attributes =  Attribute::get();
            return response()->json($attributes);
        }

        return view('dashboard.attributes.index');
    }

    public function create()
    {
        return view('dashboard.attributes.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:attributes',
            'type' => 'required',
            'value' => 'required_if:type,size,list'
        ]);

        Attribute::create($data);

        return redirect(route('dashboard.attributes.index'))->with('message', 'تم اضافة الخاصية بنجاح');
    }


    public function show(Attribute $attribute)
    {
        return view('dashboard.attributes.show', compact('attribute'));
    }


    public function edit(Attribute $attribute)
    {
        return view('dashboard.attributes.edit', compact('attribute'));
    }


    public function update(Request $request, Attribute $attribute)
    {
        $data = $request->validate([
            'name' => 'required|unique:attributes,id,' . $attribute->id,
            'type' => 'required',
            'value' => 'required_if:type,size,list'
        ]);
        $attribute->update($data);

        return redirect(route('dashboard.attributes.index'))->with('message', 'تم تعديل الخاصية بنجاح');
    }


    public function destroy(Request $request ,Attribute $attribute)
    {
        if($request->ajax())
        {
            $attribute->delete();
        }
    }
}
