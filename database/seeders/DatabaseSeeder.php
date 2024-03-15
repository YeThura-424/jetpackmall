<?php

namespace Database\Seeders;

use App\Brand;
use App\Category;
use App\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(TownshipSeeder::class);
    	$this->call(RolesTableSeeder::class);
    	$this->call(UsersTableSeeder::class);

        $categories = config('category');
        echo('Seeding Category \n');
        foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'photo' => $category['photo'],
            ]);
        }

        echo('Seeding SubCategory \n');

        $subcategories = config('subcategory');
        foreach($subcategories as $subcategory){
            $category = Category::inRandomOrder()->get()->random();
            Subcategory::create([
                'name' => $subcategory['name'],
                'photo' => $subcategory['photo'],
                'category_id' => $category->id,
            ]);
        }

        echo('Seeding Brand \n');

        $brands = config('brand');
        foreach($brands as $brand){
            Brand::create([
                'name' => $brand['name'],
                'logo' => $brand['logo'],
            ]);
        }
        $this->call(ItemSeeder::class);

    }
}
