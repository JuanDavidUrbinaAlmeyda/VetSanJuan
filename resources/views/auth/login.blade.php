<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - VetSanJuan</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuentes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            background-color: #f8f9fa;
        }

        .titulo-login {
            font-family: 'Urbanist', sans-serif;
            font-weight: 700;
            color: #080286;
        }

        .btn-primario {
            background-color: #e2ae23;
            color: #080286;
            font-weight: 600;
        }

        .btn-primario:hover {
            background-color: #d1a020;
        }

        .enlace-secundario {
            color: #080286;
            transition: color 0.2s;
        }

        .enlace-secundario:hover {
            color: #06016d;
        }

        .card-login {
            border-radius: 15px;
            border: none;
        }

        .input-login {
            border-radius: 50px;
            padding: 10px 20px;
            border: 1px solid #ced4da;
        }

        .input-login:focus {
            border-color: #e2ae23;
            box-shadow: 0 0 0 0.25rem rgba(226, 174, 35, 0.25);
        }

        .input-group .btn-outline-secondary {
            border-color: #ced4da;
            color: #6c757d;
        }

        .input-group .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            color: #080286;
        }

        .input-group .input-login {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .btn {
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }
    </style>
</head>

<body>


    <!-- Contenido Principal -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card card-login shadow-lg p-4 p-md-5">
                    <!-- Logo y Título -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('favicon.png') }}" alt="Logo VetSanJuan" width="100" height="100"
                            class="rounded-circle mb-3" style="object-fit: cover;">
                        <h3 class="titulo-login">Iniciar Sesión</h3>
                    </div>

                    <!-- Mensajes de Sesión -->
                    <x-auth-session-status class="alert alert-info mb-4" :status="session('status')" />

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">Correo Electrónico</label>
                            <input id="email" class="form-control input-login" type="email" name="email"
                                value="{{ old('email') }}" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger small" />
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium">Contraseña</label>
                            <div class="input-group">
                                <input id="password" class="form-control input-login" type="password" name="password"
                                    required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger small" />
                        </div>



                        <!-- Botón de Inicio -->
                        <button type="submit" class="btn btn-primario w-100 rounded-pill fw-bold py-2 mb-3">
                            Iniciar Sesión
                        </button>

                        <!-- Enlaces Secundarios -->
                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="d-block enlace-secundario text-decoration-none mb-2">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="d-block enlace-secundario text-decoration-none">
                                    ¿No tienes cuenta? <span class="fw-bold">Regístrate</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script para mostrar/ocultar contraseña -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>
</body>

</html>
