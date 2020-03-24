<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    protected $fillable = [
        'master_features','active','feature_text',
        'category_id',
    ];
   
    public function productFeature()
    {
        return $this->hasMany('App\Models\ProductFeature');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
