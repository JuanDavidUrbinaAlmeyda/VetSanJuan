<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ShareCartData
{
    public function handle(Request $request, Closure $next)
    {
        $cartItems = session()->get('carrito', []);
        View::share('cartItems', $cartItems);
        return $next($request);
    }
}