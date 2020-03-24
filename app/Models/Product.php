<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'main_image', 'en_name','ar_name','en_description','ar_description','qty_per_unit','qty_in_stock'
        ,'unit_desc','price','discount_perc','total_stars_rate','shop_id','brand_id',
        'category_id','gender_id','unitmeasur_id','created_date','new_flag','upcoming_flag','active',
    ];
  
   
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }
    public function unitMeasure()
    {
        return $this->belongsTo('App\Models\UnitMeasure');
    }
    public function clients()
    {
        return $this->belongsToMany(\App\Models\Client::class, 'client_products');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetails');
    }
    public function relatedProduct()
    {
        return $this->hasMany('App\Models\RelatedProduct','related_product_id','id');

    }
    public function favoriteClient()
    {
        return $this->belongsToMany(\App\Models\Client::class, 'favorites_products');
    }

    public function productSlider()
    {
        return $this->hasMany('App\Models\ProductSlider');
    }
    public function productFeature()
    {
        return $this->hasMany('App\Models\ProductFeature');
    }
    

    public function cartDetails()
    {
        return $this->hasMany('App\Models\CartDetail'.'product_id','id');
    }

}
