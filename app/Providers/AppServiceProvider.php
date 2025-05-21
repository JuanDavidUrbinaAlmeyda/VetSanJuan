<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Compartir datos del carrito con todas las vistas
        View::composer('layouts.navfoot', function ($view) {
            $cartItems = session()->get('carrito', []);
            $view->with('cartItems', $cartItems);
        });
    }
}
