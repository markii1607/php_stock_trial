<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'stock',
        'price',
    ];

    public function product_sales() {
        return $this->hasMany('App\ProductSale');
    }
}
