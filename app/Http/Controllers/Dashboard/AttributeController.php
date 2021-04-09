<?php

namespace App\Http\Controllers\Dashboard;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{

    public function index(Request $request)
    {

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

        dd('done');
    }


    public function show(Attribute $atribute)
    {
        //
    }


    public function edit(Attribute $atribute)
    {
        //
    }


    public function update(Request $request, Attribute $atribute)
    {
        //
    }


    public function destroy(Attribute $atribute)
    {
        //
    }
}
