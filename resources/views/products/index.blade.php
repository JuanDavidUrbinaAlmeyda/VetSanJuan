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

    <!--Lista de productos y filtro-->
    <div style="display: flex; padding: 20px; gap: 20px;">
        <!-- Filtros a la izquierda -->
        <aside style="width: 250px; border: 1px solid #ccc; padding: 15px; border-radius: 8px;">
            <h2>Filtros</h2>
            <form>
                <div style="margin-bottom: 15px;">
                    <label for="categoria">Categoría:</label><br>
                    <select id="categoria" name="categoria">
                        <option value="todas">Todas</option>
                        <option value="alimentos">Alimentos</option>
                        <option value="accesorios">Accesorios</option>
                        <option value="medicina">Medicina</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="precio_max">Precio máximo ($COP):</label><br>
                    <input type="number" id="precio_max" name="precio_max" min="0" step="1000" placeholder="Ej: 50000">
                </div>

                <button type="submit">Aplicar filtros</button>
            </form>
        </aside>

        <!-- Agregar lo siguiente al controlador para que el filtro tenga efecto -->
        {{-- if ($request->precio_max) {
            $query->where('precio', '<=', $request->precio_max);
        } --}}

        <!-- Lista de productos -->
        <section style="flex-grow: 1;">
            <h1>Productos</h1>
            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <!-- Tarjeta de producto -->
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <!-- Copiar y pegar esta tarjeta para más productos -->
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
                <div style="border: 1px solid #ddd; border-radius: 10px; width: 250px; padding: 15px; text-align: center;">
                    <img src="ruta/imagen_producto.jpg" alt="Producto 1" style="width: 100%; height: auto; border-radius: 6px;">
                    <h3>Nombre del Producto</h3>
                    <p>$25.000</p>
                    <button>Agregar al carrito</button>
                </div>
            </div>
        </section>

        <!-- Lo siguiente es para cuando se obtenga los productos desde la BD
        Tambien faltaria colocar los nombres correctos.
        -->
        {{-- @foreach ($productos as $producto)
        <div class="producto">
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            <h3>{{ $producto->nombre }}</h3>
            <p>${{ number_format($producto->precio, 0, ',', '.') }}</p>
            <button>Agregar al carrito</button>
        </div>
        @endforeach --}}



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