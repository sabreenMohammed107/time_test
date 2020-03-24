<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $fillable = [
        'related_product_id','active','product_id'
    ];
    
    public function mainProduct()
    {
        return $this->belongsTo('App\Models\Product','product_id');

    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product','related_product_id');

    }

   
}
