<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ImagesSlider extends Model
{
    protected $fillable =
    ['image','main_text','sub_text','order','url','shop_id','active'];

    protected $table ='images_sliders';
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
