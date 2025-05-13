<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductController extends Controller
{
    public function shop()
    {
        $listProducts = Productos::paginate(10);
        return view('shop', [
            'listProducts' => $listProducts
        ]);
    }
}
