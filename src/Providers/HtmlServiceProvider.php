<?php

namespace HamdiDev\Forms\Providers;

use HamdiDev\Forms\Html;
use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('html', function () {
            return new Html;
        });
    }
}
