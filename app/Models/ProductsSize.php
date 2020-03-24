<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductsSize extends Model
{
    protected $fillable = [
        'color','image','product_id','size_id','active'
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');

    }
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');

    }
}
