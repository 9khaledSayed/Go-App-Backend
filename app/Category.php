<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

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
