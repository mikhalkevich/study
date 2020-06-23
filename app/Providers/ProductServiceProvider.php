<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;
class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Product::created(function($data){
            dd($data->user_id);
        });
    }
}
