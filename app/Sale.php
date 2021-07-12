<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'total_sales',
    ];

    protected $casts = [
        'created_at' => 'date:F j, Y',
    ];

    public function product_sales() {
        return $this->hasMany('App\ProductSale');
    }
}
