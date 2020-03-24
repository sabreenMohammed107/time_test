<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable = [
        'active','value','feature_id',
        'product_id',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function feature()
    {
        return $this->belongsTo('App\Models\CategoryFeature');
    }
}
