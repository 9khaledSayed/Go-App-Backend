<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $casts = [

        'parent_id' => 'integer',
        'service_id' => 'integer',
        'status' => 'integer',
    ];


    public function getImagesAttribute()
    {
        if (isset($this->attributes['images']) && $this->attributes['images'] != '')
        {

            $images = unserialize($this->attributes['images']);
            foreach ($images as $key => $image)
            {
                $images[$key] = getImagesPath('Categories') . $image;
            }

            return $images;

        }else
        {
            return [];
        }

    }



    public function getImages()
    {
        if (isset($this->attributes['images']) && $this->attributes['images'] != '')
        {

            $images = unserialize($this->attributes['images']);
            foreach ($images as $key => $image)
            {
                $images[$key] =  $image;
            }

            return $images;

        }else
        {
            return [];
        }

    }


    public function children()
    {
        return $this->hasMany(Category::class ,'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class ,'parent_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class ,'service_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class , 'attribute-category' , 'category_id');
    }
}
