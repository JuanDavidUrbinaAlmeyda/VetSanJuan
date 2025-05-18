<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sigmar&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-y9bViL4r0cfY+UIg8WzzU4YUbUM8ZegK+klM/kRx6XPrUvXv0Cim5Uu3mKxxP3Igh9+0mE9oMIz3XxDj14kFQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('title')
    @yield('styles')

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

        .offcanvas {
            max-width: 350px;
        }

        .cart-items {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 1rem 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        /* Estilo para el dropdown menu */
        .dropdown-menu {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            /* Ocultar por defecto */
        }

        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            /* Mostrar al pasar el mouse */
        }

        .dropdown-item {
            color: #333;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #003673;
            color: #fff;
        }

        .nav-link.dropdown-toggle::after {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .nav-item.dropdown:hover .nav-link.dropdown-toggle::after {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <!-- 🔍 Middlebar -->
    <div class="py-3 px-4 d-flex align-items-center justify-content-between" style="    background-color: #e2ae23;">
        <!-- Logo -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="Logo" height="60">
        </a>
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
        <a href="#" class="btn rounded-pill" style="background-color: #e2ae23" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
            <img src="{{ asset('cart.png') }}" alt="Gatos" width="35" height="35" class="me-1">
        </a>
    </div>

    <!-- Offcanvas Carrito -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="cartOffcanvasLabel">Tu Carrito</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @if(isset($cartItems) && count($cartItems) > 0)
            <!-- Aquí irán los productos del carrito -->
            <div class="cart-items">
                <!-- Iteración de productos -->
            </div>
            @else
            <div class="text-center py-4">
                <img src="{{ asset('gatoyperro.png') }}" alt="Perrito triste" class="img-fluid mb-3" style="max-width: 200px;">
                <h5 class="mb-3">¡Carrito vacío!</h5>
                <p class="text-muted mb-4">No hagas esperar a tus peludos</p>
                <a href="{{ route('shop') }}" class="btn btn-primary rounded-pill" style="background-color: #003673">
                    Ir a la tienda
                </a>
            </div>
            @endif
        </div>
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
                    <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('perro.png') }}" alt="Perros" width="30" height="30"
                                class="me-1">
                            Perros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alimentos</a></li>
                            <li><a class="dropdown-item" href="#">Accesorios</a></li>
                            <li><a class="dropdown-item" href="#">Estética e Higiene</a></li>
                            <li><a class="dropdown-item" href="#">Medicamentos</a></li>
                            <li><a class="dropdown-item" href="#">Juguetes</a></li>
                        </ul>
                    </li>

                    <!-- Gatos -->
                    <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('gato.png') }}" alt="Gatos" width="28" height="28"
                                class="me-1">
                            Gatos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alimentos</a></li>
                            <li><a class="dropdown-item" href="#">Accesorios</a></li>
                            <li><a class="dropdown-item" href="#">Estética e Higiene</a></li>
                            <li><a class="dropdown-item" href="#">Medicamentos</a></li>
                            <li><a class="dropdown-item" href="#">Juguetes</a></li>
                        </ul>
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
                            <li><a class="dropdown-item" href="#">Otros</a></li>
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
                            <li><a class="dropdown-item" href="#">Baño y Peluquería</a></li>
                            <li><a class="dropdown-item" href="#">Vacunación</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Sistema de Notificaciones -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        @if(session('success'))
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="background-color: #e2ae23; color: white;">
                <strong class="me-auto">Notificación</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
        @endif
    </div>

    @yield('content')

    <footer class="py-4" style="background-color: #e2ae23;">
        <div class="container">
            <div class="row text-white">
                <!-- Links de navegación útiles -->
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <h5 style="color:white">Enlaces Útiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Inicio</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Productos</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Servicios</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contacto</a></li>
                    </ul>
                </div>

                <!-- Logo y derechos -->
                <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                    <img src="{{ asset('favicon.png') }}" alt="Logo" class="img-fluid mb-2"
                        style="max-height: 80px;">
                    <p class="mb-0">Elaborado por XXXX 2025 ©</p>
                </div>

                <!-- Redes sociales -->
                <div class="col-12 col-md-4 text-center text-md-end">
                    <h5 style="color:white">Síguenos</h5>
                    <a href="#" class="text-white text-decoration-none me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none" style="font-size: 1.5rem;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 3000
                });
            });

            // Mostrar todos los toasts
            toastList.forEach(toast => toast.show());
        });
    </script>

    @stack('scripts')
</body>