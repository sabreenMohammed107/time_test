<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $guarded = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country_id','city_id','mobile1','mobile2','job_title','company','postal_code','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
       
    ];

    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class,'client_products');
    }
    public function favoriteProduct()
    {
        return $this->belongsToMany(\App\Models\Product::class,'favorites_products');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart'.'cart_id','id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order','client_id');
    }
    
}
