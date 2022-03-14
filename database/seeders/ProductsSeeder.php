<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        ['product1','100','10'],
        ['product2','100','20'],
        ['product3','200','10'],
        ['product4','100','10']
        ,['product5','100','10']
        
        ];
        foreach($products as $product)
        {
            Product::create([
                'name'=>$product[0],
                'price'=>$product[1],
                'stock'=>$product[2],
            ]);
            }
        }
}
