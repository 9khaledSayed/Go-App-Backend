<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Integer;

class Order extends Model
{
    use SoftDeletes;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $guarded = [];

    public function getCategoryIdAttribute()
    {
        return intval($this->attributes['category_id']);
    }

    public function getUserIdAttribute()
    {
        return intval($this->attributes['user_id']);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
