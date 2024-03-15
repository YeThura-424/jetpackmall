<?php

namespace Database\Seeders;

use App\Brand;
use App\Category;
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
            $subcategory = Category::inRandomOrder()->get()->random();
            $brand = Brand::inRandomOrder()->get()->random();
            $photo[] = $product['photo'];
            Item::create([
                'codeno' => $product['codeno'],
                'name' => $product['name'],
                'photo' => json_encode($photo),
                'price' => $product['price'],
                'discount' => $product['discount'],
                'description' => $product['description'],
                'subcategory_id' => $subcategory->id,
                'brand_id' => $brand->id,
            ]);
        }
    }
}
