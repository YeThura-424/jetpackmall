<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Brand;
use App\Subcategory;
use App\Township;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $brands = Brand::all();
        $subcategories = Subcategory::inRandomOrder()->limit(11)->get(); // take only 11 random data from database
        $townships = Township::all();
        View::share('data', [$brands, $subcategories, $townships]);
    }
}
