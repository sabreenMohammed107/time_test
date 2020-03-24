<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Shipping_Contacts extends Model
{
    protected $fillable=['id','client_id'	,	'name',	
    	'mobile1'	,'mobile2',	'city_id',	'street_address',
        'postal_code',' address_feature	',	' map_location','default'
                ];	
             protected $table="shipping_contacts";   
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
