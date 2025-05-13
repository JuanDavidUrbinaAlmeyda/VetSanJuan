<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - VetSanJuan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuentes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            background-color: #f8f9fa;
        }
        
        .titulo-seccion {
            font-family: 'Urbanist', sans-serif;
            font-weight: 700;
            color: #080286;
        }
        
        .btn-primario {
            background-color: #e2ae23;
            color: #080286;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primario:hover {
            background-color: #d1a020;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .texto-descripcion {
            color: #495057;
            line-height: 1.8;
            font-size: 1.1rem;
        }
        
        .icono-destacado {
            color: #e2ae23;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .seccion-destacada {
            background-color: rgba(226, 174, 35, 0.1);
            padding: 4rem 0;
        }
        
        .img-nosotros {
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .border-amarillo {
            border-color: #e2ae23 !important;
        }
        
        .bg-azul {
            background-color: #080286;
            color: white;
        }
        
        .navbar-top {
            background-color: #080286;
            padding: 0.5rem 0;
        }
        
        .middlebar {
            background-color: #e2ae23;
            padding: 0.75rem 1rem;
        }
        
        .search-button {
            border-left: 1px solid #dee2e6 !important;
        }
    </style>
</head>
<body>
    <!-- Navbar Superior -->
    <div class="navbar-top">
        <div class="container d-flex justify-content-end">
            <a href="{{ route('login') }}" class="text-white me-3 small"><i class="bi bi-person-fill me-1"></i> Mi Cuenta</a>
            <a href="#" class="text-white small"><i class="bi bi-headset me-1"></i> Contacto</a>
        </div>
    </div>

    <!-- 🔍 Middlebar -->
    <div class="middlebar py-3 px-4 d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <img src="{{ asset('logo.png') }}" alt="Logo" height="60">

        <!-- Buscador -->
        <form class="d-flex flex-grow-1 mx-4" role="search">
            <input class="form-control rounded-start-pill" type="search" placeholder="Buscar productos..." aria-label="Buscar">
            <button class="btn btn-light rounded-end-pill search-button" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        
        <a href="{{ route('login') }}" class="btn rounded-pill" style="background-color: #e2ae23">
            <img src="{{ asset('cuenta.png') }}" alt="Cuenta" width="35" height="35" class="me-1">
        </a>
        
        <!-- Carrito -->
        <a href="#" class="btn rounded-pill" style="background-color: #e2ae23">
            <img src="{{ asset('cart.png') }}" alt="Carrito" width="35" height="35" class="me-1">
        </a>
    </div>

    <!-- Contenido Principal - Expandido en toda la página -->
    <div class="container-fluid px-0">
        <!-- Hero Section -->
        <div class="bg-azul py-5">
            <div class="container py-5 text-center">
                <h1 class="titulo-seccion text-white mb-4">Sobre Veterianaria San Juan</h1>
                <p class="lead text-white mb-0 mx-auto" style="max-width: 700px;">
                    Cuidando con amor y profesionalismo a tus mascotas
                </p>
            </div>
        </div>

        <!-- Sección Historia -->
        <div class="container py-5 my-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="{{ asset('nosotros-clinica.png') }}" alt="Nuestra Clínica" class="img-fluid img-nosotros w-100" style="height: 500px;">
                </div>
                <div class="col-lg-6">
                    <h2 class="titulo-seccion mb-4">Nuestra Historia</h2>
                    <p class="texto-descripcion mb-4">
                        Fundada en 2010, VetSanJuan nació del sueño de la Dra. María González por crear un espacio donde los animales recibieran la misma calidad de atención que los seres humanos. 
                    </p>
                    <p class="texto-descripcion mb-4">
                        Comenzamos como una pequeña clínica en el corazón de San Juan y hoy somos referentes en la región, gracias a nuestro equipo de profesionales altamente capacitados y nuestra tecnología de vanguardia.
                    </p>
                    <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check-circle-fill text-success me-2 fs-4"></i>
                        <span class="texto-descripcion">Más de 10,000 mascotas atendidas</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-check-circle-fill text-success me-2 fs-4"></i>
                        <span class="texto-descripcion">Equipo de 15 profesionales veterinarios</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Valores -->
        <div class="seccion-destacada my-5">
            <div class="container py-5">
                <h2 class="titulo-seccion text-center mb-5">Nuestros Valores</h2>
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="text-center p-4 h-100">
                            <div class="icono-destacado">
                                <i class="bi bi-heart-pulse-fill"></i>
                            </div>
                            <h3 class="titulo-seccion mb-3">Amor Animal</h3>
                            <p class="texto-descripcion">Cada paciente es tratado con el mismo cariño y dedicación que le brindaríamos a nuestras propias mascotas.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="text-center p-4 h-100">
                            <div class="icono-destacado">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <h3 class="titulo-seccion mb-3">Excelencia</h3>
                            <p class="texto-descripcion">Mantenemos los más altos estándares médicos con equipamiento de última generación y formación continua.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-4 h-100">
                            <div class="icono-destacado">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="titulo-seccion mb-3">Compromiso</h3>
                            <p class="texto-descripcion">No solo cuidamos mascotas, acompañamos a las familias en cada etapa de la vida de sus compañeros.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Equipo -->
        <div class="container py-5 my-5">
            <h2 class="titulo-seccion text-center mb-5">Conoce Nuestro Equipo</h2>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="row">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <img src="{{ asset('veterinario1.jpg') }}" alt="Dra. Mario González" class="img-fluid rounded-circle img-nosotros" style="width: 200px; height: 200px; border: 3px solid #e2ae23;">
                        </div>
                        <div class="col-md-7">
                            <h3 class="titulo-seccion">Dra. Mario González</h3>
                            <p class="text-muted mb-2">Fundador - Especialista en Cirugía</p>
                            <p class="texto-descripcion">Graduado con honores de la Universidad Nacional, con especialización en cirugía de pequeños animales en España.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-pill me-2"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="bi bi-envelope-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="row">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <img src="{{ asset('veterinario2.jpg') }}" alt="Dr. Carlos Méndez" class="img-fluid rounded-circle img-nosotros" style="width: 200px; height: 200px; border: 3px solid #e2ae23;">
                        </div>
                        <div class="col-md-7">
                            <h3 class="titulo-seccion">Dr. Carlos Méndez</h3>
                            <p class="text-muted mb-2">Dermatología Veterinaria</p>
                            <p class="texto-descripcion">Especialista en dermatología con más de 8 años de experiencia, pionero en tratamientos para alergias cutáneas.</p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-pill me-2"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="bi bi-envelope-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección CTA -->
        <div class="bg-azul py-5">
            <div class="container text-center py-4">
                <h2 class="titulo-seccion text-white mb-4">¿Listo para cuidar de tu mascota?</h2>
                <a href="{{ route('register') }}" class="btn btn-primario btn-lg rounded-pill px-5 py-3">
                    <i class="bi bi-calendar-check me-2"></i> Agenda tu primera cita
                </a>
                <p class="text-white mt-4 mb-0">
                    <i class="bi bi-telephone-fill me-2"></i> Llámanos: (123) 456-7890
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <img src="{{ asset('logo.png') }}" alt="Logo" height="50" class="mb-3">
                    <p class="texto-descripcion text-white-50">
                        Clínica veterinaria comprometida con el bienestar animal desde 2010.
                    </p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="titulo-seccion text-white mb-4">Horario</h4>
                    <ul class="list-unstyled texto-descripcion text-white-50">
                        <li class="mb-2">Lunes a Viernes: 8:00 AM - 8:00 PM</li>
                        <li class="mb-2">Sábados: 9:00 AM - 4:00 PM</li>
                        <li>Emergencias 24/7</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="titulo-seccion text-white mb-4">Contacto</h4>
                    <ul class="list-unstyled texto-descripcion text-white-50">
                        <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i> Av. Principal 123, San Juan</li>
                        <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i> info@vetsanjuan.com</li>
                        <li><i class="bi bi-telephone-fill me-2"></i> (123) 456-7890</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center text-white-50 small">
                &copy; 2023 VetSanJuan. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>