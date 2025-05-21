<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sigmar&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            max-width: 450px;
        }

        .cart-items {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 1.5rem 0;
            display: flex;
            align-items: start;
            gap: 1.5rem;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0.5rem 0;
        }

        .quantity-control input {
            width: 45px;
            text-align: center;
            padding: 0.25rem;
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
    <div class="py-3 px-4 d-flex align-items-center justify-content-between" style="background-color: #e2ae23;">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="Logo" height="60">
        </a>
        <form class="d-flex flex-grow-1 mx-4" role="search">
            <input class="form-control rounded-start-pill" type="search" placeholder="Buscar productos..." aria-label="Buscar">
            <button class="btn btn-light rounded-end-pill border-start" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <a href="{{ route('login') }}" class="btn rounded-pill" style="background-color: #e2ae23">
            <img src="{{ asset('cuenta.png') }}" alt="Cuenta" width="35" height="35" class="me-1">
        </a>
        <a href="#" class="btn rounded-pill" style="background-color: #e2ae23" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
            <img src="{{ asset('cart.png') }}" alt="Carrito" width="35" height="35" class="me-1">
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
            <div class="cart-items">
                @php $total = 0; @endphp
                @foreach($cartItems as $id => $item)
                @php $total += $item['precio'] * $item['cantidad']; @endphp
                <div class="cart-item" data-cart-item="{{ $id }}">
                    <img src="{{ asset($item['imagen']) }}" alt="{{ $item['nombre'] }}" class="cart-item-image">
                    <div class="cart-item-details">
                        <h6 class="mb-3">{{ $item['nombre'] }}</h6>
                        <div class="quantity-control">
                            <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity({{ $id }}, -1)">-</button>
                            <input type="number" min="1" value="{{ $item['cantidad'] }}"
                                class="form-control form-control-sm"
                                onchange="updateCartItem({{ $id }}, this.value)">
                            <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity({{ $id }}, 1)">+</button>
                        </div>
                        <p class="mb-0">
                            <span class="item-price" data-price="{{ $item['precio'] }}">${{ number_format($item['precio'], 2) }}</span>
                            <span class="item-total d-none">${{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                        </p>
                    </div>
                    <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
                @endforeach
                <div class="mt-4 p-4 bg-light rounded">
                    <div class="d-flex justify-content-between mb-4">
                        <h5>Total:</h5>
                        <h5 class="cart-total">${{ number_format($total, 2) }}</h5>
                    </div>
                    <a href="{{ route('carrito.index') }}" class="btn w-100 mb-3 py-2" style="background-color: #e2ae23; color: white;">Ver carrito</a>
                    <form action="{{ route('carrito.limpiar') }}" method="POST" class="mb-3">
                        @csrf
                        <button type="submit" class="btn w-100 py-2" style="background-color: #e2ae23; color: white;">Vaciar carrito</button>
                    </form>
                    <a href="{{ route('pago.formulario') }}" class="btn w-100 py-2" style="background-color: #003673; color: white;">Proceder al pago</a>
                </div>
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
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'perro', 'categoria' => 'Alimentos']) }}">Alimentos</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'perro', 'categoria' => 'Accesorios']) }}">Accesorios</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'perro', 'categoria' => 'Estética e Higiene']) }}">Estética e Higiene</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'perro', 'categoria' => 'Medicamentos']) }}">Medicamentos</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'perro', 'categoria' => 'Juguetes']) }}">Juguetes</a></li>
                        </ul>
                    </li>

                    <!-- Gatos -->
                    <li class="nav-item dropdown flex-fill text-center">
                        <a class="nav-link dropdown-toggle" href="{{ route('shop', ['especie' => 'gato']) }}" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('gato.png') }}" alt="Gatos" width="28" height="28"
                                class="me-1">
                            Gatos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'gato', 'categoria' => 'Alimentos']) }}">Alimentos</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'gato', 'categoria' => 'Accesorios']) }}">Accesorios</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'gato', 'categoria' => 'Estética e Higiene']) }}">Estética e Higiene</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'gato', 'categoria' => 'Medicamentos']) }}">Medicamentos</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'gato', 'categoria' => 'Juguetes']) }}">Juguetes</a></li>
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
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'aves']) }}">Aves</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'peces']) }}">Peces</a></li>
                            <li><a class="dropdown-item" href="{{ route('shop', ['especie' => 'otros']) }}">Otros</a></li>
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
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <h5 style="color:white">Enlaces Útiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Inicio</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Productos</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Servicios</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                    <img src="{{ asset('favicon.png') }}" alt="Logo" class="img-fluid mb-2" style="max-height: 80px;">
                    <p class="mb-0">Elaborado por XXXX 2025 ©</p>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <h5 style="color:white">Síguenos</h5>
                    <a href="#" class="text-white text-decoration-none me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none me-3" style="font-size: 1.5rem;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none" style="font-size: 1.5rem;">
                        <i class="bi bi-tiktok"></i>
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
            toastList.forEach(toast => toast.show());
        });

        function updateQuantity(id, change) {
            const input = event.target.parentElement.querySelector('input');
            const newValue = parseInt(input.value) + change;
            if (newValue >= 1) {
                input.value = newValue;
                updateCartItem(id, newValue);
            }
        }

        function updateCartItem(id, quantity) {
            const cartItem = document.querySelector(`[data-cart-item="${id}"]`);
            const priceElement = cartItem.querySelector('.item-price');
            const price = parseFloat(priceElement.getAttribute('data-price'));
            const itemTotal = price * quantity;

            cartItem.querySelector('.item-total').textContent = `$${itemTotal.toFixed(2)}`;

            let cartTotal = 0;
            document.querySelectorAll('.item-total').forEach(el => {
                cartTotal += parseFloat(el.textContent.replace('$', ''));
            });
            document.querySelector('.cart-total').textContent = `$${cartTotal.toFixed(2)}`;

            fetch(`/carrito/${id}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        cantidad: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        location.reload();
                    }
                });
        }
    </script>

    @stack('scripts')
</body>

</html>

<style>
    .cart-item {
        border-bottom: 1px solid #eee;
        padding: 1.5rem 0;
        display: flex;
        align-items: start;
        gap: 1.5rem;
    }

    .cart-item-details {
        flex-grow: 1;
        padding: 0.5rem 0;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 1rem 0;
    }

    .offcanvas-header {
        padding: 1.5rem;
    }

    .offcanvas-body {
        padding: 1.5rem;
    }

    .cart-items {
        max-height: calc(100vh - 250px);
        overflow-y: auto;
        padding: 0.5rem;
    }

    .cart-total-section {
        margin-top: 2rem;
        padding: 1.5rem;
    }
</style>

</html>