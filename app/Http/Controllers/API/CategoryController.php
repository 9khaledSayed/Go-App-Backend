<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get()->map( function ($mainCategory){

            return
            [
                "id" =>  $mainCategory['id'],
                "parent_id" =>  $mainCategory['parent_id'],
                "service_id" =>  $mainCategory['service_id'],
                "name" =>  $mainCategory['name'],
                "description" =>  $mainCategory['description'],
                "images" =>  $mainCategory['images'],
                "status" =>  $mainCategory['status'],
                "children" => $mainCategory->children
            ];

        });

        return response($categories);

    }
}
