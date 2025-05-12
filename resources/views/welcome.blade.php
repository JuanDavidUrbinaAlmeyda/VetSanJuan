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

        #heroSlider {
            ;
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
                    <img src="{{ asset('shop.png') }}" alt="Tienda" class="img-fluid">
                </div>
                <h5 class="mt-2">Tienda</h5>
            </div>
            <!-- Peluquería y Baño -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <img src="{{ asset('tijeras.png') }}" alt="Peluquería y Baño" class="img-fluid">
                </div>
                <h5 class="mt-2">Baño y Peluquería</h5>
            </div>
            <!-- Veterinaria -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <img src="{{ asset('vet.png') }}" alt="Veterinaria" class="img-fluid">
                </div>
                <h5 class="mt-2">Veterinaria</h5>
            </div>
            <!-- Vacunación -->
            <div class="col-6 col-md-3 mb-4">
                <div class="icon-circle mx-auto" style="width: 100px; height: 100px; padding: 15px;">
                    <img src="{{ asset('jer.png') }}" alt="Vacunación" class="img-fluid">
                </div>
                <h5 class="mt-2">Vacunación</h5>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <!-- Producto 1 -->
            <div class="col">
                <div class="card producto-card h-100 border rounded position-relative">
                    <img src="{{ asset('pp1.jpg') }}" class="card-img-top p-3" alt="Producto 1">
                    <div class="card-body text-center">
                        <p class="mb-1 text-muted">Marca Ficticia</p>
                        <h6 class="card-title">Juguete Para Gato Pájaro Verde</h6>
                        <p class="fw-bold" style="color:#003673">$3.950</p>
                        <button class="btn btn-sm text-white rounded-pill" style="background-color: #003673">
                            <h6 class="mb-0" style="color:white">Comprar</h6>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="col">
                <div class="card producto-card h-100 border rounded position-relative">
                    <img src="{{ asset('pp2.png') }}" class="card-img-top p-3" alt="Producto 2">
                    <div class="card-body text-center">
                        <p class="mb-1 text-muted">Mascota Store</p>
                        <h6 class="card-title">Cepillo Para Perro Antienredos</h6>
                        <p class="fw-bold" style="color:#003673">$9.050</p>
                        <button class="btn btn-sm text-white rounded-pill" style="background-color:#003673">
                            <h6 class="mb-0" style="color:white">Comprar</h6>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="col">
                <div class="card producto-card h-100 border rounded position-relative">
                    <img src="{{ asset('pp3.png') }}" class="card-img-top p-3" alt="Producto 3">
                    <div class="card-body text-center">
                        <p class="mb-1 text-muted">Gatitos Co.</p>
                        <h6 class="card-title">Juguete Para Gato Ratón Marrón</h6>
                        <p class="fw-bold" style="color:#003673">$2.950</p>
                        <button class="btn btn-sm text-white rounded-pill" style="background-color: #003673">
                            <h6 class="mb-0" style="color:white">Comprar</h6>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="col">
                <div class="card producto-card h-100 border rounded position-relative">
                    <img src="{{ asset('pp4.png') }}" class="card-img-top p-3" alt="Producto 4">
                    <div class="card-body text-center">
                        <p class="mb-1 text-muted">AnimalFun</p>
                        <h6 class="card-title">Juguete Estrella Con Plumas</h6>
                        <p class=" fw-bold" style="color:#003673">$2.950</p>
                        <button class="btn btn-sm text-white rounded-pill" style="background-color: #003673">
                            <h6 class="mb-0" style="color:white">Comprar</h6>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Dales la Bienvenida</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 text-center">
                <img src="{{ asset('c1.png') }}" alt="Imagen 1" class="img-fluid rounded bienvenida-img">
            </div>
            <div class="col-12 col-md-6 text-center">
                <img src="{{ asset('c2.png') }}" alt="Imagen 2" class="img-fluid rounded bienvenida-img">
            </div>
        </div>
    </div>

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
                    <img src="{{ asset('favicon.png') }}" alt="Logo" class="img-fluid mb-2" style="max-height: 80px;">
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

</body>

</html>
