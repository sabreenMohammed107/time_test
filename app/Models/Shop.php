<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'en_name', 'ar_name', 'admin_id','logo','main_img','slogan','description','business_type','total_revenue_annual'
        ,'block1_image','block2_image','block3_image','block4_image',
        'block1_text','block2_text','block3_text','block4_text','location','facebook_url','default_curr',
        'twitter_url','instgram_url','whatsapp_num','active'
    ];
  
    public function admins()
    {
        return $this->belongsToMany('\App\Models\Admin');
    }
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency','default_curr');

    }
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function orders()
    {
        return $this->belongsToMany(\App\Models\Order::class, 'orders');
    }
  
    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class, 'shop_category');
    }
    public function categories_name()
    {
        return $this->belongsToMany(\App\Models\Category::class,'shop_category')->select(array('id', 'en_name'));
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\shopContact');
    }

    public function sliders()
    {
        return $this->hasMany('App\Models\imagesSlider');
    }
}
