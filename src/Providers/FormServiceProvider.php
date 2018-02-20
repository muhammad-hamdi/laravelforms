<?php

namespace HamdiDev\Forms\Providers;

use HamdiDev\Forms\Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
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
        app()->bind('form', function () {
            return new Form;
        });
    }
}
