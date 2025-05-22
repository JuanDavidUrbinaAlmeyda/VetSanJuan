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

    /* Estilo para el valor del precio */
    #precioValor {
        font-weight: bold;
        color: #0d6efd;
    }

    /* Estilo para los filtros */
    .filtro-seccion {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .filtro-seccion h5 {
        color: #080286;
        font-weight: 600;
    }

    .form-check-input:checked {
        background-color: #080286;
        border-color: #080286;
    }
</style>
@endsection
@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Sidebar de Filtros -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Filtros</h4>
                    <form method="GET" action="{{ route('shop') }}" id="filtroForm">
                        <!-- Filtro por Especie -->
                        <div class="filtro-seccion">
                            <h5 class="mb-3">Especie</h5>
                            @php
                            $especies = [
                            'perro' => 'Perros',
                            'gato' => 'Gatos',
                            'aves' => 'Aves',
                            'peces' => 'Peces',
                            'otros' => 'Otros',
                            ];
                            @endphp
                            @foreach ($especies as $value => $label)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="especie"
                                    id="especie_{{ $value }}" value="{{ $value }}"
                                    {{ request('especie') == $value ? 'checked' : '' }}>
                                <label class="form-check-label" for="especie_{{ $value }}">
                                    {{ $label }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Filtro por Categoría -->
                        <div class="filtro-seccion">
                            <h5 class="mb-3">Categoría</h5>
                            @php
                            $categorias = ['Alimentos', 'Accesorios', 'Estética e Higiene', 'Medicamentos', 'Juguetes'];
                            @endphp
                            @foreach ($categorias as $categoria)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="categoria"
                                    id="categoria_{{ $categoria }}" value="{{ $categoria }}"
                                    {{ request('categoria') == $categoria ? 'checked' : '' }}>
                                <label class="form-check-label" for="categoria_{{ $categoria }}">
                                    {{ $categoria }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Filtro por Marca -->
                        <div class="filtro-seccion">
                            <h5 class="mb-3">Marca</h5>
                            <input type="text" id="buscarMarca" class="form-control mb-2" placeholder="Buscar marca...">
                            <div id="listaMarcas">
                                @foreach ($marcas as $id => $nombre)
                                    <div class="form-check marca-item" data-nombre="{{ strtolower($nombre) }}">
                                        <input class="form-check-input" type="radio" name="marca_id" id="marca_{{ $id }}" value="{{ $id }}" {{ request('marca_id') == $id ? 'checked' : '' }}>
                                        <label class="form-check-label" for="marca_{{ $id }}">
                                            {{ $nombre }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Filtro por Edad -->
                        <div class="filtro-seccion">
                            <h5 class="mb-3">Edad</h5>
                            @php
                            $edades = ['cachorro' => 'Cachorro', 'adulto' => 'Adulto', 'senior' => 'Senior'];
                            @endphp
                            @foreach ($edades as $value => $label)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edad"
                                    id="edad_{{ $value }}" value="{{ $value }}"
                                    {{ request('edad') == $value ? 'checked' : '' }}>
                                <label class="form-check-label" for="edad_{{ $value }}">
                                    {{ $label }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Filtro por Precio -->
                        <div class="filtro-seccion">
                            <h5 class="mb-3">Filtrar por precio</h5>
                            <div class="mb-3">
                                <label for="precio_max" class="form-label">Precio máximo: $<span
                                        id="precioValor">{{ request('precio_max', 1000000) }}</span></label>
                                <input type="range" class="form-range" min="0" max="1000000" step="1000"
                                    id="precio_max" name="precio_max" value="{{ request('precio_max', 1000000) }}">
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                            <a href="{{ route('shop') }}" class="btn btn-outline-secondary">Limpiar Filtros</a>
                        </div>
                    </form>
                </div>
            </div>
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
                        <img src="{{$producto->imagen }}" class="card-img-top rounded-top-4" alt="{{ $producto->nombre }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text text-primary fw-bold">
                                ${{ number_format($producto->precio, 2) }}</p>
                            <a href="{{ route('shop.producto', $producto->id) }}" class="btn btn-outline-primary">Ver Más</a>
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
    // Script para el precio máximo
    document.addEventListener('DOMContentLoaded', function() {
        const precioInput = document.getElementById('precio_max');
        const precioValor = document.getElementById('precioValor');

        if (precioInput && precioValor) {
            precioValor.textContent = new Intl.NumberFormat('es-MX').format(precioInput.value);

            precioInput.addEventListener('input', function() {
                precioValor.textContent = new Intl.NumberFormat('es-MX').format(this.value);
            });
        }

        // Script para filtro de marcas
        const buscarMarcaInput = document.getElementById('buscarMarca');
        const marcaItems = document.querySelectorAll('.marca-item');
        const verMasMarcasBtn = document.getElementById('verMasMarcas');

        if (buscarMarcaInput) {
            buscarMarcaInput.addEventListener('input', function() {
                const busqueda = this.value.toLowerCase().trim();

                marcaItems.forEach(item => {
                    const nombreMarca = item.getAttribute('data-nombre');
                    item.style.display = nombreMarca.includes(busqueda) ? '' : 'none';
                });

                if (busqueda.length > 0 && verMasMarcasBtn) {
                    verMasMarcasBtn.style.display = 'none';
                } else if (verMasMarcasBtn) {
                    verMasMarcasBtn.style.display = '';
                    limitarMarcasVisibles();
                }
            });
        }

        function limitarMarcasVisibles() {
            if (marcaItems.length > 10) {
                marcaItems.forEach((item, index) => {
                    item.style.display = index < 4 ? '' : 'none';
                });
            }
        }

        if (verMasMarcasBtn) {
            verMasMarcasBtn.addEventListener('click', function() {
                marcaItems.forEach(item => {
                    item.style.display = '';
                });
                this.style.display = 'none';
            });

            limitarMarcasVisibles();
        }
    });
</script>
@endpush
@endsection