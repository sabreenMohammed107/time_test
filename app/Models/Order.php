<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no', 'client_id', 'order_value','vat_value','shipping_value','net_value','order_date','order_status_id'
        ,'deleivery_date','order_shipping_id','client_note','shop_note','shop_id'
        
    ];
  
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetails');
    }
    
    
    public function clients()
    {
        return $this->belongsToMany('\App\Models\Client::class', 'client_product');
    }

    public function shops()
    {
        return $this->belongsTo('\App\Models\Shop', 'shop_id');
    }
    public function customer()
    {
        return $this->belongsTo('\App\Models\Client', 'client_id');
    }

    public function status()
    {
        return $this->belongsTo('\App\Models\OrderStatus', 'order_status_id');
    }

   
}
