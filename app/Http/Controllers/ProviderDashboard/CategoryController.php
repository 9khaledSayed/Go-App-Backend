<?php

namespace App\Http\Controllers\ProviderDashboard;

use App\Attribute;
use App\Category;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $parentCategories = Category::whereNull('parent_id')->with('service')->get();

            return response()->json($parentCategories);

        }

        return view('provider_dashboard.categories.index');
    }

    public function childrenCategories(Request $request)
    {
        if ($request->ajax())
        {
            $category_id         = $request->toArray()['query']['category_id'];
            $childrenCategories  = Category::where('parent_id' , $category_id)->get();

            return response()->json([
                'data' => $childrenCategories,
                'meta' => [
                    'page' => 1 ,
                    'pages' => $childrenCategories->count() / 5 ,
                    'perpage' => 5 ,
                    'sort' => "asc" ,
                    'total' => $childrenCategories->count() ,
                ]
            ]);
        }
    }


    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        $services         = Service::all();
        $attributes       = Attribute::get(['id','name']);

        return view('provider_dashboard.categories.create', compact('parentCategories','services','attributes'));

    }


    public function store(Request $request)
    {

        $validation = Validator::make($request->all() , [
            'name'        => 'required | string | max:255',
            'description' => 'required_if:type,sub',
//            'service_id' => 'required_if:type,main',
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
            $images = $category->getImages();
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



    public function  deleteImage(Request $request)
    {
        if ($request->ajax())
        {
            $category  = Category::find($request['category_id']);
            $images    = $category->getImages();
            array_splice($images,$request['image_index'],1);
            $category->update([
                'images' => serialize($images)
            ]);
        }

    }


    public function storeAttributes(Request $request )
    {
dd($request->toArray());
        $category   = Category::find( $request['category_id'] );
        $attributes = $request['attributes'];

        if( $attributes )
            $category->attributes()->detach();
        $category->attributes()->attach($attributes);

    }



    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {

        $parentCategories = Category::whereNull('parent_id')->get();
        $services         = Service::all();
        $attributes       = Attribute::get(['id','name']);
        $categoryID       = $category->id;

        return view('provider_dashboard.categories.edit', compact('category','parentCategories','services','attributes','categoryID'));
    }


    public function update(Request $request, Category $category)
    {


        $validation = Validator::make($request->all() , [
            'name'        => 'required | string | max:255 ',
            'description' => 'required_if:type,sub',
//            'service_id' => 'required_if:type,main',
            'parent_id' => 'required_if:type,sub',
        ]);

        if ($validation->fails())
        {
            return response()->json([
                "errors" => $validation->errors(),
                "code" => 422
            ]);
        }

        $category->update([
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

    public function destroy(Request $request, Category $category)
    {

        if($request->ajax())
        {
            $category->delete();
        }
    }
}
