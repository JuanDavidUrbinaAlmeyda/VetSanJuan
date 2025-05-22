@extends('layouts.navfoot')
@section('title')
    <title>Inicio - VetSanJuan</title>
@endsection
@section('styles')

    <style>
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

        #heroSlider {
            /* Reduce todo el slider */
            transform-origin: top center;

            /* Opcional: ajusta espacio si queda hueco */
        }

        @media (max-width: 768px) {
            #heroSlider {
                transform: scale(1);
                /* Tamaño completo en móviles */
                margin-top: 0;
            }
        }

        .icon-circle {
            background: white;
            border: 2px solid #eee;
            border-radius: 50%;
            padding: 10px;
            font-size: 1.5rem;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .icon-circle {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 50%;
            overflow: hidden;
        }

        .icon-circle:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Estilo para la card con animación */
        .producto-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .producto-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Asegura que las imágenes dentro de las cards estén bien centradas y no deformadas */
        .producto-card img {
            max-height: 180px;
            object-fit: contain;
        }

        .bienvenida-img {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .bienvenida-img:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
@section('content')
    <div id="heroSlider" class="carousel slide mb-0" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('BANNER.png') }}" class="d-block w-100 img-fluid" alt="Hero Vet 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('BANNER.png') }}" class="d-block w-100 img-fluid" alt="Hero Vet 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('BANNER.png') }}" class="d-block w-100 img-fluid" alt="Hero Vet 3">
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>

        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <!-- Tienda -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <a href="{{ route('shop') }}">
                        <img src="{{ asset('shop.png') }}" alt="Tienda" class="img-fluid">
                    </a>
                </div>
                <h5 class="mt-2">Tienda</h5>
            </div>
            <!-- Peluquería y Baño -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <a href="{{route('dashboard')}}#peluqueria">
                    <img src="{{ asset('tijeras.png') }}" alt="Peluquería y Baño" class="img-fluid">
                    </a>
                </div>
                <h5 class="mt-2">Baño y Peluquería</h5>
            </div>
            <!-- Veterinaria -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <a href="{{route('dashboard')}}#veterinaria">
                    <img src="{{ asset('vet.png') }}" alt="Veterinaria" class="img-fluid">
                    </a>
                </div>
                <h5 class="mt-2">Veterinaria</h5>
            </div>
            <!-- Vacunación -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <a href="{{route('dashboard')}}#vacunacion">
                    <img src="{{ asset('jer.png') }}" alt="Vacunación" class="img-fluid">
                    </a>
                </div>
                <h5 class="mt-2">Vacunación</h5>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">

            @forelse($productosDestacados as $producto)
                <div class="col">
                    <div class="card producto-card h-100 border rounded position-relative">
                        <img src="{{$producto->imagen}}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body text-center">
                            <p class="mb-1 text-muted">{{ $producto->marca->nombre }}</p>
                            <h6 class="card-title">{{ $producto->nombre }}</h6>
                            <p class="fw-bold" style="color:#003673">
                                ${{ number_format($producto->presentaciones->isNotEmpty() ? $producto->presentaciones->first()->precio_unitario : $producto->precio, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('shop.producto', $producto->id) }}" class="btn btn-sm text-white rounded-pill" style="background-color: #003673">
                                <h6 class="mb-0" style="color:white">Comprar</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No hay productos destacados disponibles en este momento.</p>
                </div>
            @endforelse

        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Dales la Bienvenida</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 text-center">
                <a href="{{ route('shop', ['especie' => 'perro', 'edad' => 'cachorro']) }}">
                    <img src="{{ asset('c1.png') }}" alt="Imagen 1" class="img-fluid rounded bienvenida-img">
                </a>
            </div>
            <div class="col-12 col-md-6 text-center">
                <a href="{{ route('shop', ['especie' => 'gato', 'edad' => 'cachorro']) }}">
                    <img src="{{ asset('c2.png') }}" alt="Imagen 2" class="img-fluid rounded bienvenida-img">
                </a>
            </div>
        </div>
    </div>

@endsection

