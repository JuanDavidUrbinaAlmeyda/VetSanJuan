<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        $query = Producto::query();

        // Filtros por categoría y subcategoría
        if ($request->filled('especie')) {
            $query->where('especie', $request->especie);
        }

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }
        if ($request->filled('marca_id')) {
            $query->where('marca_id', $request->marca_id);
        }
        if ($request->filled('edad')) {
            $query->where('edad', $request->edad);
        }
        if ($request->filled('q')) {
            $query->where('nombre', 'like', '%' . $request->q . '%');
        }

        $listProducts = $query->paginate(10)->withQueryString();
        $marcas = \App\Models\Marca::pluck('nombre', 'id');

        return view('shop', [
            'listProducts' => $listProducts,
            'especie' => $request->especie,
            'categoria' => $request->categoria,
            'edad' => $request->edad,
            'precio_max' => $request->precio_max,
            'marca_id' => $request->marca_id,
            'marcas' => $marcas,
            'imagen' => $request->imagen,
            'q' => $request->q,
        ]);
    }
    public function home()
    {
        $productosDestacados = \App\Models\Producto::where('destacado', true)
            ->with('presentaciones')
            ->take(4)
            ->get();

        return view('welcome', compact('productosDestacados'));
    }
    public function showProduct($id)
    {
        $producto = Producto::with(['presentaciones'])->findOrFail($id);
        return view('showProduct', compact('producto'));
    }
}
