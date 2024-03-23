<?php

namespace Database\Seeders;

use App\Item;
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
            $photo[] = $product['photo'];
            Item::create([
                'codeno' => $product['codeno'],
                'name' => $product['name'],
                'photo' => json_encode($photo),
                'price' => $product['price'],
                'discount' => $product['discount'],
                'description' => $product['description'],
                'subcategory_id' => $product['subcategory_id'],
                'brand_id' => $product['brand_id'],
            ]);
        }
    }
}
