<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Product A',
                'stock' => 10,
                'price' => 100,
            ],
            [
                'name' => 'Product B',
                'stock' => 15,
                'price' => 50,
            ],
            [
                'name' => 'Product C',
                'stock' => 5,
                'price' => 200,
            ],
        ];

        foreach ($data as $d) {
            Product::create($d);
        }
    }
}
