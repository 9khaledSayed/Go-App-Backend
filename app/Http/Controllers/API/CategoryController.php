<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $serviceID  = $request['service_id'];

        $categories = Service::find($serviceID)->categories->whereNull('parent_id')->map( function ($mainCategory){

        return
        [
            "id" =>  $mainCategory['id'],
            "parent_id" =>  $mainCategory['parent_id'],
            "service_id" =>  $mainCategory['service_id'],
            "name" =>  $mainCategory['name'],
            "description" =>  $mainCategory['description'],
            "images" =>  $mainCategory['images'],
            "status" =>  $mainCategory['status'],
            "attributes" => $mainCategory['attributes']->map(function ($attribute){
                return
                [
                        "name" => $attribute['name'],
                        "value" => $attribute['value'],
                        "type" => $attribute['type'],
                ];
            }),
            "children" => $mainCategory->children->map( function ($childCategory){

                return
                [
                    "id" =>  $childCategory['id'],
                    "parent_id" =>  $childCategory['parent_id'],
                    "service_id" =>  $childCategory['service_id'],
                    "name" =>  $childCategory['name'],
                    "description" =>  $childCategory['description'],
                    "images" =>  $childCategory['images'],
                    "status" =>  $childCategory['status'],
                    "children" => [],
                    "attributes" => $childCategory['attributes']->map(function ($attribute){
                        return
                            [
                                "name" => $attribute['name'],
                                "value" => $attribute['value'],
                                "type" => $attribute['type'],
                            ];
                    })
                ];
            })
        ];

        });


        return response($categories);

    }
}
