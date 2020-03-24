<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{
    protected $fillable = [
        'image','order','active',
        'product_id',
    ];
    public function slider()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
