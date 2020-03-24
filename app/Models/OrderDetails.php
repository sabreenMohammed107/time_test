<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'product_qty', 'product_cost', 'total_line_cost','note','order_id','product_id'
    ];
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
 
}
