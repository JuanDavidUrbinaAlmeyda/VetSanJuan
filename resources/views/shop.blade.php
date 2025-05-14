@extends('layouts.navfoot')
@section('title')
    <title>Tienda</title>
@endsection
@section('styles')
    <style>
      
        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .banner {
            background: url('https://via.placeholder.com/1920x500') no-repeat center center;
            background-size: cover;
            height: 500px;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: 800;
        }

        .slider img {
            width: 100%;
            height: auto;
        }

        .dropdown-item {
            color: black;
        }

        .nav-link {
            color: black;
        }


        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .card-title {
            font-size: 1.1rem;
        }

        input[type="range"]::-webkit-slider-thumb {
            background-color: #0d6efd;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid my-5 mx-5">
        <div class="row">
            <!-- Sidebar de Filtros -->
            <div class="col-md-3 mb-4">
                <h5 class="mb-3">Filtrar por especie</h5>

                <form method="GET" action="{{ route('shop') }}">
                    <!-- Filtro por Categoría -->
                    <h5 class="mb-3">Categoría</h5>
                    @php
                        $categorias = [
                            'perro' => 'Perros',
                            'gato' => 'Gatos',
                            'aves' => 'Aves',
                            'peces' => 'Peces',
                            'otros' => 'Otros',
                        ];
                    @endphp
                    @foreach ($categorias as $value => $label)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categoria"
                                id="categoria_{{ $value }}" value="{{ $value }}"
                                {{ request('categoria') == $value ? 'checked' : '' }}>
                            <label class="form-check-label" for="categoria_{{ $value }}">
                                {{ $label }}
                            </label>
                        </div>
                    @endforeach

                    <!-- Filtro por Subcategoría -->
                    <h5 class="mt-4 mb-3">Subcategoría</h5>
                    @php
                        $subcategorias = ['Alimentos', 'Accesorios', 'Estética e Higiene', 'Medicamentos', 'Juguetes'];
                    @endphp
                    @foreach ($subcategorias as $sub)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="subcategoria"
                                id="sub_{{ $sub }}" value="{{ $sub }}"
                                {{ request('subcategoria') == $sub ? 'checked' : '' }}>
                            <label class="form-check-label" for="sub_{{ $sub }}">
                                {{ $sub }}
                            </label>
                        </div>
                    @endforeach

                    <!-- Filtro por Marca -->
                    <h5 class="mt-4 mb-3">Marca</h5>
                    @foreach ($marcas as $marca)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="marca"
                                id="marca_{{ $loop->index }}" value="{{ $marca }}"
                                {{ request('marca') == $marca ? 'checked' : '' }}>
                            <label class="form-check-label" for="marca_{{ $loop->index }}">
                                {{ $marca }}
                            </label>
                        </div>
                    @endforeach


                    <!-- Filtro por Precio -->
                    <h5 class="mt-4 mb-3">Filtrar por precio</h5>
                    <div class="mb-3">
                        <label for="precio_max" class="form-label">Precio máximo: $<span
                                id="precioValor">{{ request('precio_max', 1000000) }}</span></label>
                        <input type="range" class="form-range" min="0" max="1000000" step="1000"
                            id="precio_max" name="precio_max" value="{{ request('precio_max', 1000000) }}">
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-primary mt-3 w-100">Aplicar Filtros</button>

                    <!-- Botón de limpiar -->
                    <a href="{{ route('shop') }}" class="btn btn-secondary mt-2 w-100">Limpiar Filtros</a>
                </form>
            </div>

            <!-- Contenido principal: Productos -->
            <div class="col-md-9">
                <h2 class="mb-4">Tienda</h2>
                <div class="row" id="productGrid">
                    @foreach ($listProducts as $producto)
                        <div class="col-sm-6 col-md-4 mb-4 product-card"
                            data-name="{{ strtolower($producto->nombre) }}"
                            data-price="{{ $producto->precio_unitario }}">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <img src="{{ asset($producto->url_imagen) }}" class="card-img-top rounded-top-4"
                                    alt="{{ $producto->nombre }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                    <p class="card-text text-primary fw-bold">
                                        ${{ number_format($producto->precio_unitario, 2) }}</p>
                                    <a href="" class="btn btn-outline-primary">Ver Más</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const precioInput = document.getElementById('precio_max');
            const precioValor = document.getElementById('precioValor');

            if (precioInput && precioValor) {
                precioInput.addEventListener('input', function() {
                    precioValor.textContent = this.value;
                });
            }
        </script>
    @endpush
@endsection
