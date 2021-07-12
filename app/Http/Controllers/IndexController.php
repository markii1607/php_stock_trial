<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductSale;
use App\Sale;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(Product $product, Sale $sale, ProductSale $prod_sale) {
        $this->product = $product;
        $this->sale = $sale;
        $this->prod_sale = $prod_sale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        $sales = $this->sale->all();

        return view('index', ['products' => $products, 'sales' => $sales]);
    }

    public function editProduct($id)
    {
        $prod = $this->product->find($id);
        return view('edit', ['prod' => $prod]);
    }

    public function updateProduct(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
        ]);

        if ($validate) {
            $prod = $this->product->find($id);
            $prod->name = $request->name;
            $prod->stock = $request->stock;
            $prod->price = $request->price;
            $prod->update();

            return redirect('/');
        }
    }
}
