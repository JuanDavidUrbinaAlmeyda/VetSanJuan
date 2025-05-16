<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - VetSanJuan</title>
    <link rel="icon" href="favicon.png" type="image/png">
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
        
        .titulo-recuperacion {
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
        
        .btn-volver {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 50px;
        }
        
        .btn-volver:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }
        
        .enlace-secundario {
            color: #080286;
            transition: color 0.2s;
        }
        
        .enlace-secundario:hover {
            color: #06016d;
            text-decoration: none;
        }
        
        .card-recuperacion {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .input-recuperacion {
            border-radius: 50px;
            padding: 10px 20px;
            border: 1px solid #ced4da;
        }
        
        .input-recuperacion:focus {
            border-color: #e2ae23;
            box-shadow: 0 0 0 0.25rem rgba(226, 174, 35, 0.25);
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .texto-informativo {
            color: #6c757d;
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #080286;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="40" height="40" class="me-2">
            </a>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card card-recuperacion p-4 p-md-5">
                    <!-- Logo y Título -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('favicon.png') }}" alt="Logo VetSanJuan" width="100" height="100" class="rounded-circle mb-3" style="object-fit: cover; border: 3px solid #e2ae23;">
                        <h3 class="titulo-recuperacion">Recuperar Contraseña</h3>
                    </div>

                    <!-- Mensaje Informativo -->
                    <div class="texto-informativo">
                        ¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="alert alert-info mb-4" :status="session('status')" />

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">Correo Electrónico</label>
                            <input id="email" class="form-control input-recuperacion" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger small" />
                        </div>

                        <!-- Botón de Envío -->
                        <button type="submit" class="btn btn-primario w-100 rounded-pill fw-bold py-2">
                            Enviar enlace de recuperación
                        </button>

                        <!-- Enlace a Login -->
                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" class="enlace-secundario">
                                 Volver al inicio de sesión
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>