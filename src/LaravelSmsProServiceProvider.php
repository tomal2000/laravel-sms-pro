<?php

namespace Tomal2000\LaravelSmsPro;

use Illuminate\Support\ServiceProvider;

class LaravelSmsProServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $publishTag = 'laravel-sms-pro';
        $this->publishes([
            __DIR__.'/config/laravel-sms-pro.php' => config_path('laravel-sms-pro.php'),
        ],$publishTag);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
