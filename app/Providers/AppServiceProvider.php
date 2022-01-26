<?php

namespace App\Providers;


use App\Models\category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as View;

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
        View::composer('FrontEnd.include.banner', function($view){
            $view->with('categories', category::where('category_status',1)->get());
        });
        View::composer('FrontEnd.include.food', function($view){
            $view->with('categories', category::where('category_status',1)->get());
        });

        Schema::defaultStringLength(191);
    }
}
