<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = [
        'review_date', 'review_text', 'name','email','stars_rank','review_type','active','client_id',
        'shop_id','product_id'
       
    ];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
