<?php

use App\Category;
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
        echo('Seeding Category');
        foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'photo' => $category['photo'],
            ]);
        }

        // $categories = Category::all();

    }
}
