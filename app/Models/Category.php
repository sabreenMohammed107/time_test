<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'en_name', 'ar_name', 'active','parent_category_id',
    ];
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function shops()
    {
        return $this->belongsToMany(\App\Models\Shop::class, 'shop_category');
    }
    public function parent()
    {
        return $this->hasMany(\App\Models\Categry::class, 'categories','id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class,'parent_category_id');
    }
}
