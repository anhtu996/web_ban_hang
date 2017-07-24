<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\ProductType;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layout.header','page.product-type'], 'App\Http\ViewComposers\ProfileComposer' );
        View::composer(['layout.header','page.checkout'], 'App\Http\ViewComposers\CartComposer' );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
