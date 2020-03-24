<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ShopContact extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email','phone','message_date','message','shop_id','client_id',
        'country_id'
       
    ];
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
