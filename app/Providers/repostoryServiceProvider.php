<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Types\This;

class repostoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\ProductsInterface',
            'App\Http\Repositories\ProductsRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\CartInterface',
            'App\Http\Repositories\CartRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\OrderInterface',
            'App\Http\Repositories\OrderRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
