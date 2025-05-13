<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sigmar&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-y9bViL4r0cfY+UIg8WzzU4YUbUM8ZegK+klM/kRx6XPrUvXv0Cim5Uu3mKxxP3Igh9+0mE9oMIz3XxDj14kFQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <style>
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Urbanist', sans-serif;
            font-weight: 800;
            font-optical-sizing: auto;
            font-style: bold;
            color: black;

        }

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
</head>

<body>


    <!-- 🔍 Middlebar -->
    <div class="py-3 px-4 d-flex align-items-center justify-content-between" style="    background-color: #e2ae23;">
        <!-- Logo -->
        <img src="{{ asset('logo.png') }}" alt="Logo" height="60">

        <!-- Buscador -->
        <form class="d-flex flex-grow-1 mx-4" role="search">
            <input class="form-control rounded-start-pill" type="search" placeholder="Buscar productos..."
                aria-label="Buscar">
            <button class="btn btn-light rounded-end-pill border-start" type="submit">
                <i class="bi bi-search "></i>
            </button>
        </form>
        <a href="{{ route('login') }}" class="btn rounded-pill" style="background-color: #e2ae23">
            <img src="{{ asset('cuenta.png') }}" alt="Gatos" width="35" height="35" class="me-1">

        </a>
        <!-- Carrito -->
        <a href="#" class="btn rounded-pill" style="background-color: #e2ae23">
            <img src="{{ asset('cart.png') }}" alt="Gatos" width="35" height="35" class="me-1">

        </a>
    </div>

    <!-- 🧭 Navbar inferior -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-top border-bottom w-100">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
                <ul class="navbar-nav d-flex w-100 mb-2 mb-lg-0">

                    <!-- Perros -->
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('perro.png') }}" alt="Perros" width="25" height="25"
                                class="me-1">
                            Perros
                        </a>
                    </li>

                    <!-- Gatos -->
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('gato.png') }}" alt="Gatos" width="30" height="30"
                                class="me-1">
                            Gatos
                        </a>
                    </li>

                    <!-- Otras Mascotas -->
                    <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('mas.png') }}" alt="Otras mascotas" width="20" height="20"
                                class="me-1">
                            Otras Mascotas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Aves</a></li>
                            <li><a class="dropdown-item" href="#">Peces</a></li>
                            <li><a class="dropdown-item" href="#">Pequeños</a></li>
                        </ul>
                    </li>

                    <!-- Marcas -->
                    <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('label.png') }}" alt="Marcas" width="20" height="20"
                                class="me-1">
                            Marcas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Marca 1</a></li>
                            <li><a class="dropdown-item" href="#">Marca 2</a></li>
                            <li><a class="dropdown-item" href="#">Marca 3</a></li>
                        </ul>
                    </li>

                    <!-- Servicios -->
                    <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('maletin.png') }}" alt="Servicios" width="20" height="20"
                                class="me-1">
                            Servicios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Veterinaria</a></li>
                            <li><a class="dropdown-item" href="#">Peluquería</a></li>
                            <li><a class="dropdown-item" href="#">Entrenamiento</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid my-5">
        <div class="row">
            <!-- Sidebar de Filtros -->
            <div class="col-md-3 mb-4">
                <h5 class="mb-3">Filtrar</h5>

                <!-- Filtro por precio -->
                <label for="priceRange" class="form-label">Precio máximo: $<span id="priceValue">1000</span></label>
                <input type="range" class="form-range" min="0" max="1000" id="priceRange">

                <!-- Búsqueda por nombre -->
                <input type="text" id="searchInput" class="form-control mt-4" placeholder="Buscar por nombre...">
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
                                    <a href=""
                                        class="btn btn-outline-primary">Ver Más</a>
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
            const priceInput = document.getElementById('priceRange');
            const priceValue = document.getElementById('priceValue');
            const searchInput = document.getElementById('searchInput');
            const productCards = document.querySelectorAll('.product-card');

            // Actualizar valor del rango
            priceInput.addEventListener('input', () => {
                priceValue.textContent = priceInput.value;
                filterProducts();
            });

            // Filtrar por nombre
            searchInput.addEventListener('input', () => {
                filterProducts();
            });

            function filterProducts() {
                const maxPrice = parseFloat(priceInput.value);
                const searchTerm = searchInput.value.toLowerCase();

                productCards.forEach(card => {
                    const productName = card.dataset.name;
                    const productPrice = parseFloat(card.dataset.price);

                    const matchesSearch = productName.includes(searchTerm);
                    const matchesPrice = productPrice <= maxPrice;

                    card.style.display = (matchesSearch && matchesPrice) ? '' : 'none';
                });
            }
        </script>
    @endpush

</body>
