<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $fillable = [
        'cart_id', 'product_id', 'product_qty','notes',
    ];
    public function products()
    {
        return $this->belongsTo('App\Models\Product','product_id');

    }
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart','cart_id');

    }
    
}
