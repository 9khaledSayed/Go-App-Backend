<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


if(!function_exists('getImagesPath')){
    function getImagesPath($model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);
        return asset('/storage/Images').'/'.$model.'/';
    }
}


if(!function_exists('uploadImage')){

    function uploadImage($request, $model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);
        $path         = "/Images/".$model;
        $originalName =  $request->getClientOriginalName(); // Get file Original Name
        $imageName    = 'go-app_'.time()  .$originalName;  // Set Image name based on user name and time
        $request->storeAs($path, $imageName,'public');
        return $imageName;
    }
}


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


if(!function_exists('isTabOpen')){

    //$request->file('image')

    function isTabOpen($path){

        if ( request()->segment(2)  === $path )
            return 'menu-item-open';

    }
}



if(!function_exists('isTabActive')){

    //$request->file('image')

    function isTabActive($path){

        if ( request()->segment(2) . request()->segment(3) === $path  ||  request()->segment(2) . '/'. request()->segment(3) === $path )
            return 'menu-item-active';
    }
}
