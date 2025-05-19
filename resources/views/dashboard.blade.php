@extends('layouts.navfoot')
@section('title')
    <title>Dashboard</title>
@endsection
@section('styles')
    <style>
        /* Estilo general para cards */
        .custom-card {
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .custom-card:hover {
            transform: scale(1.03);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .pet-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .custom-nav-link:hover {
            color: #e2ae23 !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light vh-100 p-3">
                <h5 class="fw-bold">Menú</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-black custom-nav-link" href="#"
                            onclick="showSection('perfil')">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black custom-nav-link" href="#"
                            onclick="showSection('mascotas')">Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black custom-nav-link" href="#"
                            onclick="showSection('citas')">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black custom-nav-link" href="#"
                            onclick="showSection('peluqueria')">Peluquería y Baño</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black custom-nav-link" href="#"
                            onclick="showSection('veterinaria')">Veterinaria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black custom-nav-link" href="#"
                            onclick="showSection('vacunacion')">Vacunación</a>
                    </li>
                </ul>

            </div>

            <!-- Contenido -->
            <div class="col-md-10 p-4">

                <!-- PERFIL -->
                <div id="perfil" class="section active">
                    <h2>Perfil</h2>
                    <p>Bienvenido/a, {{ $user->name }}.</p>
                    <p><strong>Nombre completo:</strong> {{ $cliente->nombre }} {{ $cliente->apellido }}</p>
                    <p><strong>Email:</strong> {{ $cliente->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                    <p><strong>Ciudad:</strong> {{ $cliente->ciudad }}</p>
                </div>


                <!-- MASCOTAS -->
                <!-- MASCOTAS -->
                <div id="mascotas" class="section">
                    <h2>Mascotas</h2>
                    <div class="row g-4">
                        @forelse($mascotas as $mascota)
                            <div class="col-md-4">
                                <div class="card custom-card">
                                    <img src="{{ $mascota->image ?? 'https://placekitten.com/400/200' }}" class="pet-img"
                                        alt="Mascota {{ $mascota->nombre_mascota }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $mascota->nombre_mascota }}</h5>
                                        <p>Raza: {{ $mascota->raza ? $mascota->raza->nombre_raza : 'N/A' }}</p>
                                        <p>Sexo: {{ $mascota->sexo ? $mascota->sexo->description : 'N/A' }}</p>
                                        <p>Tamaño: {{ $mascota->tamano ? $mascota->tamano->descripcion : 'N/A' }}</p>
                                        <p>Especie: {{ $mascota->especie ? $mascota->especie->nombre_especie : 'N/A' }}</p>

                                        <button class="btn btn-primary"
                                            onclick="alert(
                        'Fecha Nac: {{ $mascota->fecha_nacimiento }}\n' +
                        'Edad: {{ $mascota->edad }} años\n' +
                        'Peso: {{ $mascota->peso }} kg\n' +
                        'Vacunas: {{ $mascota->vacunas ?? 'N/A' }}\n' +
                        'Alergias: {{ $mascota->alergias ?? 'N/A' }}\n' +
                        'Comentarios: {{ $mascota->comentarios ?? 'N/A' }}'
                    )">Leer
                                            más</button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No tienes mascotas registradas.</p>
                        @endforelse

                    </div>
                </div>


                <!-- CITAS -->
                <div id="citas" class="section">
                    <h2>Citas</h2>
                    <div class="row g-4">
                        @forelse($citas as $cita)
                            <div class="col-md-6">
                                <div class="card custom-card p-3">
                                    <h5>Cita - {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</h5>
                                    <p>Hora: {{ $cita->hora }}</p>
                                    <p>Mascota: {{ $cita->mascota->nombre_mascota ?? 'N/A' }}</p>
                                    <p>Veterinario: {{ $cita->veterinario->nombre ?? 'N/A' }}</p>
                                    <p>
                                        Servicio: {{ optional($cita->servicios->first())->nombre ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p>No hay citas registradas.</p>
                        @endforelse
                    </div>
                </div>


                <!-- PELUQUERÍA Y BAÑO -->
                <div id="peluqueria" class="section">
                    <h2>Agendar Peluquería y Baño</h2>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <!-- Mascota -->
                        <div class="mb-3">
                            <label for="mascota_id" class="form-label">Mascota</label>
                            <select name="mascota_id" id="mascota_id" class="form-control" required>
                                <option value="">Seleccione una mascota</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre_mascota }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required
                                min="{{ date('Y-m-d') }}">
                        </div>

                        <!-- Hora -->
                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora</label>
                            <select name="hora" id="hora" class="form-control" required>
                                <option value="">Seleccione una hora</option>
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

                        <!-- Veterinario -->
                        <div class="mb-3">
                            <label for="veterinario_id" class="form-label">Veterinario</label>
                            <select name="veterinario_id" id="veterinario_id" class="form-control" required>
                                <option value="">Seleccione un veterinario</option>
                                @foreach ($veterinarios as $vet)
                                    <option value="{{ $vet->id }}">{{ $vet->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Servicio oculto (Peluquería y Baño = ID 1) -->
                        <input type="hidden" name="servicio_id" value="1">

                        <button type="submit" class="btn btn-primary">Reservar Cita</button>
                    </form>
                </div>


                <!-- VETERINARIA -->
                <div id="veterinaria" class="section">
                    <h2>Agendar Cita Veterinaria</h2>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <!-- Mascota -->
                        <div class="mb-3">
                            <label for="mascota_id" class="form-label">Mascota</label>
                            <select name="mascota_id" id="mascota_id" class="form-control" required>
                                <option value="">Seleccione una mascota</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre_mascota }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required
                                min="{{ date('Y-m-d') }}">
                        </div>

                        <!-- Hora -->
                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora</label>
                            <select name="hora" id="hora" class="form-control" required>
                                <option value="">Seleccione una hora</option>
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

                        <!-- Veterinario -->
                        <div class="mb-3">
                            <label for="veterinario_id" class="form-label">Veterinario</label>
                            <select name="veterinario_id" id="veterinario_id" class="form-control" required>
                                <option value="">Seleccione un veterinario</option>
                                @foreach ($veterinarios as $vet)
                                    <option value="{{ $vet->id }}">{{ $vet->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Servicio oculto (Veterinaria = ID 2) -->
                        <input type="hidden" name="servicio_id" value="2">

                        <button type="submit" class="btn btn-primary">Reservar Cita</button>
                    </form>
                </div>

                <!-- VACUNACIÓN -->
                <div id="vacunacion" class="section">
                    <h2>Agendar Vacunación</h2>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <!-- Mascota -->
                        <div class="mb-3">
                            <label for="mascota_id" class="form-label">Mascota</label>
                            <select name="mascota_id" id="mascota_id" class="form-control" required>
                                <option value="">Seleccione una mascota</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre_mascota }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required
                                min="{{ date('Y-m-d') }}">
                        </div>

                        <!-- Hora -->
                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora</label>
                            <select name="hora" id="hora" class="form-control" required>
                                <option value="">Seleccione una hora</option>
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

                        <!-- Veterinario -->
                        <div class="mb-3">
                            <label for="veterinario_id" class="form-label">Veterinario</label>
                            <select name="veterinario_id" id="veterinario_id" class="form-control" required>
                                <option value="">Seleccione un veterinario</option>
                                @foreach ($veterinarios as $vet)
                                    <option value="{{ $vet->id }}">{{ $vet->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Servicio oculto (Vacunación = ID 3) -->
                        <input type="hidden" name="servicio_id" value="3">

                        <button type="submit" class="btn btn-primary">Reservar Cita</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- JS para mostrar secciones -->
    <script>
        function showSection(id) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(id).classList.add('active');
        }
    </script>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const section = urlParams.get('section');
            if (section) {
                showSection(section);
            } else {
                showSection('perfil'); // sección por defecto
            }
        };

        function showSection(id) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            const selected = document.getElementById(id);
            if (selected) selected.classList.add('active');
        }
    </script>
@endsection
