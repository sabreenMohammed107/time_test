<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'client_id', 'total_cost', 'vat_value','shipping_value','net_value','notes'
    ];
    public function clients()
    {
        return $this->belongsTo('App\Models\Client','client_id');

    }
    public function cartDetails()
    {
        return $this->hasMany('App\Models\CartDetail'.'cart_id','id');
    }

}
