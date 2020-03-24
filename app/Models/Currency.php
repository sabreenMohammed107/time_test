<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'name', 'reference', 'rate','active',
    ];
    public function shop()
    {
        return $this->hasMany('App\Models\Shop','default_curr','id');

    }
}
