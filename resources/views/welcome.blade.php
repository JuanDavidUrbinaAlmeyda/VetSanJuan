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
            transform: scale(0.6);
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
    </style>
</head>

<body>
    <div class="bg-light text-end px-4 py-2 border-bottom">
        <small class="me-3">¿Ya tienes cuenta?</small>
        <a href="#" class="text-decoration-none">
            <i class="bi bi-person-circle"></i> Iniciar sesión
        </a>
    </div>

    <!-- 🔍 Middlebar -->
    <div class="py-3 px-4 d-flex align-items-center justify-content-between" style="    background-color: #080286;">
        <!-- Logo -->
        <img src="{{ asset('favicon.png') }}" alt="Logo" height="60">

        <!-- Buscador -->
        <form class="d-flex flex-grow-1 mx-4" role="search">
            <input class="form-control rounded-start-pill" type="search" placeholder="Buscar productos..."
                aria-label="Buscar">
            <button class="btn btn-light rounded-end-pill border-start" type="submit">
                <i class="bi bi-search text-success"></i>
            </button>
        </form>

        <!-- Carrito -->
        <a href="#" class="btn btn-warning rounded-pill">
            <i class="bi bi-cart3"></i> Carrito
        </a>
    </div>

    <!-- 🧭 Navbar inferior -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-top border-bottom">
        <div class="container-fluid px-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Mascotas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Mascotas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Perros</a></li>
                            <li><a class="dropdown-item" href="#">Gatos</a></li>
                            <li><a class="dropdown-item" href="#">Aves</a></li>
                            <li><a class="dropdown-item" href="#">Peces</a></li>
                            <li><a class="dropdown-item" href="#">Pequeños</a></li>
                        </ul>
                    </li>

                    <!-- Marcas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Marcas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Marca 1</a></li>
                            <li><a class="dropdown-item" href="#">Marca 2</a></li>
                            <li><a class="dropdown-item" href="#">Marca 3</a></li>
                        </ul>
                    </li>

                    <!-- Servicios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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
                <img src="{{ asset('heroVet.png') }}" class="d-block w-100 img-fluid" alt="Hero Vet 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('heroVet2.png') }}" class="d-block w-100 img-fluid" alt="Hero Vet 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('heroVet3.png') }}" class="d-block w-100 img-fluid" alt="Hero Vet 3">
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

    <!-- Cards de valores -->
    <div class="container" style=" position: relative; z-index: 5;">
        <div class="row text-center g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card shadow rounded-4 position-relative pt-5">
                    <div class="icon-circle position-absolute top-0 start-50 translate-middle">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Calidad</h5>
                        <p class="card-text">Ofrecemos productos cuidadosamente seleccionados con los más altos
                            estándares.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card shadow rounded-4 position-relative pt-5">
                    <div class="icon-circle position-absolute top-0 start-50 translate-middle">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Transparencia</h5>
                        <p class="card-text">Información clara y honesta sobre cada uno de nuestros productos y
                            servicios.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card shadow rounded-4 position-relative pt-5">
                    <div class="icon-circle position-absolute top-0 start-50 translate-middle">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Variedad</h5>
                        <p class="card-text">Una amplia gama de opciones para todas las mascotas, tamaños y
                            necesidades.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
