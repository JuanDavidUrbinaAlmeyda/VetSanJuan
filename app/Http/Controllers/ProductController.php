<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        $query = Productos::query();

        // Filtros por categoría y subcategoría
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('subcategoria')) {
            $query->where('subcategoria', $request->subcategoria);
        }
        if ($request->filled('precio_max')) {
            $query->where('precio_unitario', '<=', $request->precio_max);
        }
        if ($request->filled('marca')) {
            $query->where('marca', $request->marca);
        }

        // Puedes agregar más filtros si deseas (precio, marca, etc.)
        $listProducts = $query->paginate(10)->withQueryString();
        $marcas = Productos::select('marca')
            ->whereNotNull('marca')
            ->distinct()
            ->pluck('marca');

        return view('shop', [
            'listProducts' => $listProducts,
            'categoria' => $request->categoria,
            'subcategoria' => $request->subcategoria,
            'precio_max' => $request->precio_max,
            'marca' => $request->marca,
            'marcas' => $marcas,

        ]);
    }
}
