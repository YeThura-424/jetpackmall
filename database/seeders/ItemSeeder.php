<?php

namespace Database\Seeders;

use App\Item;
use App\ProductDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('product');
        foreach($products as $product){
            Item::create([
                'codeno' => $product['codeno'],
                'name' => $product['name'],
                'photo' => json_encode($product['photo']),
                'price' => $product['price'],
                'description' => $product['description'],
                'subcategory_id' => $product['subcategory_id'],
                'brand_id' => $product['brand_id'],
            ]);
        }
    }
}
