<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer('*', function($view){
            $view->with('category', Category::all());
            $view->with('brand', Brand::all());
            $view->with('color', Color::all());
        });
    }
}
