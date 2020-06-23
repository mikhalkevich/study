<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;

class DataServiceProvider extends ServiceProvider
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
        User::created(function($data){
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            mail($data->email, 'thema', 'body', $headers);
            //openServer/data/tmp/письма тут.
        });
    }
}
