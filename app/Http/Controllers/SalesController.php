<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductSale;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function __construct(Product $product, Sale $sale, ProductSale $prod_sale) {
        $this->product = $product;
        $this->sale = $sale;
        $this->prod_sale = $prod_sale;
    }

    public function create()
    {
        $products = $this->product->all();
        return view('create_sale', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $total_product_price = 0;
        foreach ($request->product_price as $key => $price) {
            $total_product_price += $price * $request->product_qty[$key];
        }

        $new_sale = $this->sale->create([
            'total_sales' => $total_product_price,
        ]);

        if ($new_sale) {
            foreach ($request->product_qty as $key => $qty) {
                $this->prod_sale->create([
                    'product_id' => $request->product_id[$key],
                    'sale_id' => $new_sale->id,
                    'quantity' => $qty,
                    'price_sale' => $request->product_price[$key],
                ]);

                $prod = $this->product->find($request->product_id[$key]);
                $prod->stock = $prod->stock - $qty;
                $prod->update();
            }

            return redirect('/');
        }
    }

    public function addSale(Request $request) {
        $this->validate(request(), [
            'products' => ['required', function ($attribute, $value, $fail) {
                foreach($value as $val) {
                    $val = json_decode($val, true);
                    if ($val['stock'] == 0) {
                        $fail('You cannot sale an item that has no more stocks left');
                    }
                }
            }],
        ], ['products.required' => 'Please select at least one product to sale.']);

        $prod_id = [];

        foreach ($request->products as $pr) {
            array_push($prod_id, json_decode($pr, true)['id']);
        }

        $products = $this->product->find($prod_id);
        return view('create_sale', ['products' => $products]);
    }
}
