<?php

namespace App\Http\Controllers\Dashboard;

use App\Attribute;
use App\Category;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CategoryController extends Controller
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
            $parentCategories = Category::whereNull('parent_id')->with('service')->get();

            return response()->json($parentCategories);

        }

        return view('dashboard.categories.index');
    }

    public function childrenCategories(Request $request)
    {
        if ($request->ajax())
        {
            $category_id = $request->toArray()['query']['category_id'];
            $childrenCategories  = Category::where('parent_id' , $category_id)->get();
            return response()->json($childrenCategories);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        $services         = Service::all();
        $attributes       = Attribute::get(['id','name']);

        return view('dashboard.categories.create', compact('parentCategories','services','attributes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all() , [
            'name'        => 'required | string | max:255 | unique:categories',
            'description' => 'required_if:type,sub',
            'service_id' => 'required_if:type,main',
            'parent_id' => 'required_if:type,sub',
        ]);

        if ($validation->fails())
        {
            return response()->json([
                "errors" => $validation->errors(),
                "code" => 422
            ]);
        }

        $category = Category::create([
            'name'        => $request['name'],
            'description' => $request['description'],
            'service_id' => $request['service_id'],
            'parent_id' => $request['parent_id'],
            'status' => $request['status'] == 'on'
        ]);

        return response()->json([
            "category_id" => $category['id'],
            "code" => 200
        ]);
    }


    public function storeImages(Request $request)
    {

        $category_id = $request['category_id'];

        $category = Category::find($category_id);


        $imageName = uploadImage($request->file('file'), "Categories");


        if ($category->images)
        {
            $images    = unserialize($category->images);
            array_push($images,$imageName);
            $category->images = serialize($images);
            $category->save();
        }else
        {
            $images  = array();
            array_push($images,$imageName);
            $category->images = serialize($images);
            $category->save();
        }



    }

    public function storeAttributes(Request $request )
    {

        $category   = Category::find( $request['category_id'] );
        $attributes = $request['attributes'];

        if( $attributes )
        $category->attributes()->attach($attributes);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {

        if($request->ajax())
        {
            Category::find($id)->destroy($id);
        }
    }
}
