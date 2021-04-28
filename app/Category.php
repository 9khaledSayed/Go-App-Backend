<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function getImagesAttribute()
    {
        if (isset($this->attributes['images']) && $this->attributes['images'] != '') {

            $images = unserialize($this->attributes['images']);
            foreach ($images as $key => $image){
                $images[$key] = getImagesPath('Categories') . $image;
            }
            return $images;

        }else {
            return [];
        }

    }

    public function getServiceIdAttribute()
    {
        return intval($this->attributes['service_id']);
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
