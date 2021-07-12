<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSale extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'sale_id',
        'quantity',
        'price_sale',
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function sale() {
        return $this->belongsTo('App\Sale');
    }
}
