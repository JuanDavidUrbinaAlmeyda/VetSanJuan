@extends('layouts.navfoot')
@section('title')
    <title>Dashboard</title>
@endsection
@section('styles')
    <style>
        .sidebar {
            padding-top: 20px;
            border-right: 1px solid #e0e0e0;
            background-color: #fff;
            height: 100%;
            min-height: 100%;
        }

        .main-content {
            padding: 20px;
            min-height: 100%;
        }



        .sidebar-link {
            color: #333;
            padding: 12px 20px;
            display: block;
            transition: all 0.3s;
            cursor: pointer;
            text-align: left;
            text-decoration: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            color: #000;
            background-color: #f8f9fa;
        }


        .content-section {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .content-section.active {
            display: block;
            opacity: 1;
        }



        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .mascota-card,
        .cita-card {
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }

        .mascota-card {
            margin-bottom: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .mascota-imagen {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .mascota-info {
            padding: 15px;
        }

        .mascota-nombre {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .mascota-detalles {
            color: #666;
            margin-bottom: 15px;
        }

        .modal-mascota .modal-content {
            border-radius: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar py-5">
                <div class="d-flex flex-column">
                    <a class="sidebar-link active" data-section="perfil">
                        <i class="fas fa-user me-2"></i> Perfil
                    </a>
                    <a class="sidebar-link" data-section="citas">
                        <i class="fas fa-calendar-alt me-2"></i> Citas
                    </a>
                    <a class="sidebar-link" data-section="mascotas">
                        <i class="fas fa-paw me-2"></i> Mascotas
                    </a>
                    <a class="sidebar-link" data-section="peluqueria">
                        <i class="fas fa-cut me-2"></i> Peluquería y Baño
                    </a>
                    <a class="sidebar-link" data-section="veterinaria">
                        <i class="fas fa-stethoscope me-2"></i> Veterinaria
                    </a>
                    <a class="sidebar-link" data-section="vacunacion">
                        <i class="fas fa-syringe me-2"></i> Vacunación
                    </a>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="col-md-10 p-4 main-content">
                <!-- Sección Perfil -->
                <div id="perfil" class="content-section active">
                    <h2 class="mb-4">Perfil del Cliente</h2>
                    <div class="card">
                        <div class="card-body">
                            <h4>Bienvenido, {{ $user->name }}</h4>
                            <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
                            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sección Citas -->
                <div id="citas" class="content-section">
                    <h2 class="mb-4">Mis Citas</h2>
                    <div class="row">
                        @forelse($citas as $cita)
                            <div class="col-md-6 col-lg-4">
                                <div class="card cita-card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                                        </h5>
                                        <p class="card-text">
                                            <strong>Hora:</strong> {{ $cita->hora }}<br>
                                            <strong>Mascota:</strong> {{ $cita->mascota->nombre_mascota }}<br>
                                            <strong>Veterinario:</strong>
                                            {{ $cita->veterinario->nombre ?? 'No definido' }}<br>
                                            <strong>Servicio:</strong> {{ $cita->servicio->nombre }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>No hay citas agendadas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Sección Mascotas -->
                <div id="mascotas" class="content-section">
                    <h2 class="mb-4">Mis Mascotas</h2>
                    <div class="row">
                        @forelse($mascotas as $mascota)
                            <div class="col-md-6 col-lg-4">
                                <div class="card mascota-card">
                                    <img src="{{ $mascota->foto }}" class="mascota-imagen"
                                        alt="{{ $mascota->nombre_mascota }}">
                                    <div class="mascota-info">
                                        <h5 class="mascota-nombre">{{ $mascota->nombre_mascota }}</h5>
                                        <p class="mascota-detalles">
                                            {{ $mascota->edad }} años - {{ $mascota->especie->nombre_especie ?? 'N/A' }}
                                        </p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#mascotaModal{{ $mascota->id }}">
                                            Leer más
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para cada mascota -->
                            <div class="modal fade modal-mascota" id="mascotaModal{{ $mascota->id }}" tabindex="-1"
                                aria-labelledby="mascotaModalLabel{{ $mascota->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mascotaModalLabel{{ $mascota->id }}">
                                                {{ $mascota->nombre_mascota }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $mascota->foto }}" class="img-fluid rounded mb-3"
                                                alt="{{ $mascota->nombre_mascota }}">
                                            <p><strong>Edad:</strong> {{ $mascota->edad }} años</p>
                                            <p><strong>Especie:</strong> {{ $mascota->especie->nombre_especie ?? 'N/A' }}
                                            </p>
                                            <p><strong>Raza:</strong> {{ $mascota->raza->nombre_raza ?? 'N/A' }}</p>
                                            <p><strong>Sexo:</strong> {{ $mascota->sexo->descripcion ?? 'N/A' }}</p>
                                            <p><strong>Peso:</strong> {{ $mascota->peso }} kg</p>
                                            @if ($mascota->vacunas)
                                                <p><strong>Vacunas:</strong> {{ $mascota->vacunas }}</p>
                                            @endif
                                            @if ($mascota->alergias)
                                                <p><strong>Alergias:</strong> {{ $mascota->alergias }}</p>
                                            @endif
                                            @if ($mascota->comentarios)
                                                <p><strong>Comentarios:</strong> {{ $mascota->comentarios }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>No tienes mascotas registradas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Pestaña Peluquería y Baño -->
                <div id="peluqueria" class="content-section active section">
                    <h2>Peluquería y Baño - Agendar Cita</h2>

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="mascota_id_peluqueria" class="form-label">Mascota</label>
                            <select name="mascota_id" id="mascota_id_peluqueria" class="form-select" required>
                                <option value="" disabled selected>Seleccione una mascota</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre_mascota }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_peluqueria" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha_peluqueria" class="form-control"
                                min="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora_peluqueria" class="form-label">Hora</label>
                            <select name="hora" id="hora_peluqueria" class="form-select" required>
                                <option value="" disabled selected>Seleccione una hora</option>
                                @php
                                    $horas = [
                                        '08:00 AM',
                                        '09:00 AM',
                                        '10:00 AM',
                                        '11:00 AM',
                                        '12:00 PM',
                                        '01:00 PM',
                                        '02:00 PM',
                                        '03:00 PM',
                                        '04:00 PM',
                                        '05:00 PM',
                                    ];
                                @endphp
                                @foreach ($horas as $hora)
                                    <option value="{{ $hora }}">{{ $hora }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="veterinario_id_peluqueria" class="form-label">Peluquero</label>
                            <select name="peluquero_id" id="peluquero_id_peluqueria" class="form-select" required>
                                <option value="" disabled selected>Seleccione un peluquero</option>
                                @foreach ($peluqueros as $peluquero)
                                    <option value="{{ $peluquero->id }}">{{ $peluquero->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="tipo_servicio_id" value="1">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Reservar Cita</button>
                        </div>
                    </form>
                </div>

                <!-- Pestaña Veterinaria -->
                <div id="veterinaria" class="content-section section">
                    <h2>Veterinaria - Agendar Cita</h2>

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="mascota_id_veterinaria" class="form-label">Mascota</label>
                            <select name="mascota_id" id="mascota_id_veterinaria" class="form-select" required>
                                <option value="" disabled selected>Seleccione una mascota</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre_mascota }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_veterinaria" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha_veterinaria" class="form-control"
                                min="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora_veterinaria" class="form-label">Hora</label>
                            <select name="hora" id="hora_veterinaria" class="form-select" required>
                                <option value="" disabled selected>Seleccione una hora</option>
                                @foreach ($horas as $hora)
                                    <option value="{{ $hora }}">{{ $hora }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="veterinario_id_veterinaria" class="form-label">Veterinario</label>
                            <select name="veterinario_id" id="veterinario_id_veterinaria" class="form-select" required>
                                <option value="" disabled selected>Seleccione un veterinario</option>
                                @foreach ($veterinarios as $vet)
                                    <option value="{{ $vet->id }}">{{ $vet->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="tipo_servicio_id" value="2">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Reservar Cita</button>
                        </div>
                    </form>
                </div>

                <!-- Pestaña Vacunación -->
                <div id="vacunacion" class="content-section section" >
                    <h2>Vacunación - Agendar Cita</h2>

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="mascota_id_vacunacion" class="form-label">Mascota</label>
                            <select name="mascota_id" id="mascota_id_vacunacion" class="form-select" required>
                                <option value="" disabled selected>Seleccione una mascota</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre_mascota }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_vacunacion" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha_vacunacion" class="form-control"
                                min="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora_vacunacion" class="form-label">Hora</label>
                            <select name="hora" id="hora_vacunacion" class="form-select" required>
                                <option value="" disabled selected>Seleccione una hora</option>
                                @foreach ($horas as $hora)
                                    <option value="{{ $hora }}">{{ $hora }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="veterinario_id_vacunacion" class="form-label">Veterinario</label>
                            <select name="veterinario_id" id="veterinario_id_vacunacion" class="form-select" required>
                                <option value="" disabled selected>Seleccione un veterinario</option>
                                @foreach ($veterinarios as $vet)
                                    <option value="{{ $vet->id }}">{{ $vet->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="tipo_servicio_id" value="3">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Reservar Cita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const sidebarLinks = document.querySelectorAll('.sidebar-link');
                    const sections = document.querySelectorAll('.content-section');

                    // Al cargar la página, mostrar solo la sección 'perfil' (o la que tenga el link activo)
                    sections.forEach(section => {
                        if (section.id === 'perfil') {
                            section.classList.add('active');
                        } else {
                            section.classList.remove('active');
                        }
                    });

                    sidebarLinks.forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();

                            // Remover clase 'active' de todos los links y añadirla al link clickeado
                            sidebarLinks.forEach(l => l.classList.remove('active'));
                            this.classList.add('active');

                            // Ocultar todas las secciones (removiendo la clase 'active')
                            sections.forEach(section => {
                                section.classList.remove('active');
                            });

                            // Mostrar la sección correspondiente al data-section del link (añadiendo la clase 'active')
                            const targetId = this.getAttribute('data-section');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                targetSection.classList.add('active');
                            }
                        });
                    });
                });
            </script>
        @endpush
    @endsection
