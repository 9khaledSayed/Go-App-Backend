<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;


/*

* updated by ahmed gamal => changed the name to getImagesPath

*/

if(!function_exists('getImagesPath')){
    function getImagesPath($model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);
        return asset('/storage/Images').'/'.$model.'/';
    }
}

if(!function_exists('getAdminImagesPath')){
    function getAdminImagesPath($model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);
        return env('ZUMAX_ADMIN_LINK') . 'storage/Images/'.$model.'/';
    }
}




/**
 * Store a newly image .
 *
 * @param  \Illuminate\Http\Request  $request, $model (Model to use it to directory name),
 * @return \Illuminate\Http\Response $imageName
 * Author : Wageh
 * Updated By Wagih @ 7-2-2021
 * Added Path varibale
 * Author : Wageh
 * Updated By Wagih @ 7-2-2021
 * Added Path varibale
 * update by andrew @8-2-2021
 * replace profile_pic to image
 */
if(!function_exists('uploadImage')){

    function uploadImage($request, $model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);
        $path         = "/Images/".$model;
        $originalName =  $request->getClientOriginalName(); // Get file Original Name
        $imageName    = 'zumax_'.time()  .$originalName;  // Set Image name based on user name and time
        $request->storeAs($path, $imageName,'public');
        return $imageName;
    }
}



/**
 * Delete image .
 *
 * @param  $imageName, $model (Model to use it to directory name),
 * Author : Wageh
 * Updated By Khaled @ 21-3-2021
 * Added condition to prevent delete default.png
 */

if(!function_exists('deleteImage')){

    //$request->file('image')

    function deleteImage($imageName, $model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);
        if ($imageName != 'default.png'){
            $path = "/Images/".$model.'/'.$imageName;
            Storage::disk('public')->delete($path);
        }
    }
}


if(!function_exists('getTransactionIds')){

    //$request->file('image')

    function getTransactionIds($obj){
        $string = '';
        foreach($obj as $ob){
            $string = $string.$ob['id'].',';
        }
        return rtrim($string, ", ");
    }
}

if(!function_exists('affiliteSetting')){



    function affiliteSetting(){
        return \App\Models\AffiliateSetting::first();
    }
}
if(!function_exists('isTabOpen')){

    //$request->file('image')

    function isTabOpen($path){

        if ( request()->segment(2)  === $path )
            return 'menu-item-open';

    }
}

if(!function_exists('findTemplate')){
    function findTemplate(){
        $templates = ["template1","template2"];
        $url = (string)url()->previous();

        foreach($templates as $temp){
            if(strpos($url, $temp) !== false){
                return $temp;
            }
        }
    }
}


if(!function_exists('isTabActive')){

    //$request->file('image')

    function isTabActive($path){

        if ( request()->segment(2) . request()->segment(3) === $path  ||  request()->segment(2) . '/'. request()->segment(3) === $path )
            return 'menu-item-active';
    }
}


if(!function_exists('categories')){
    function categories(){
        $categories = Category::whereNull('parent_id')->get()->map(function ($category)
        {
            return
                [
                    "id" => $category['id'],
                    "name"  => $category['name'],
                    "slug"  => $category['slug'],
                    "nodes" => $category->children->map(function ($category){
                        return [
                            "id" => $category['id'],
                            "name"  => $category['name'],
                            "slug"  => $category['slug'],
                            'nodes' =>$category->children->map(function ($category){

                                return [
                                    "id" => $category['id'],
                                    "name"  => $category['name'],
                                    "slug"  => $category['slug'],
                                ];

                            })
                        ];
                    })
                ];
        })->toArray();
        return $categories;
    }
}

function findPercentage($price,$discountPrice){
    // $discountPrice = $discountPrice + $price;
    return number_format(( ( (float)$discountPrice - (float)$price )  / (float)$price ) * 100,1);
}

function attribute_categories(){
    return App\Models\AttributeCategory::get();
}
