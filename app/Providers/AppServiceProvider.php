<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;

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
        User::created(function($obj){
            $thema = 'test';
            $body = '<>asdf</>';
            $headers= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf8\r\n";
            $headers .= "From: Birthday Reminder <birthday@example.com>\r\n";
            @mail($obj->email, $thema,$body, $headers);

        });
        //User::observe(\App\Observers\UserObserver::class);
    }
}
