@extends('layouts.navfoot')
@section('title')
    <title>Nosotros - VetSanJuan</title>
@endsection
@section('styles')
<style>
    .hero-nosotros {
        background: linear-gradient(rgba(0, 54, 115, 0.7), rgba(0, 54, 115, 0.7));
        background-size: cover;
        padding: 100px 0;
        color: white;
        text-align: center;
    }
    
    .hero-nosotros h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color:white;
    }
    
    .hero-nosotros p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .section-title {
        position: relative;
        margin-bottom: 2rem;
        font-weight: 700;
        color: #003673;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background-color: #e2ae23;
    }
    
    .value-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
    }
    
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .value-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        border-radius: 50%;
        color: #003673;
        font-size: 2rem;
    }
    
    .team-member {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .team-member img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 1rem;
        border: 5px solid #f8f9fa;
        transition: transform 0.3s;
    }
    
    .team-member:hover img {
        transform: scale(1.05);
        border-color: #e2ae23;
    }
    
    .timeline {
        position: relative;
        padding: 0;
        list-style: none;
    }
    
    .timeline:before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        width: 4px;
        margin-left: -2px;
        background-color: #e2ae23;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 50px;
    }
    
    .timeline-item:after {
        content: "";
        display: table;
        clear: both;
    }
    
    .timeline-item .timeline-panel {
        position: relative;
        float: left;
        width: 46%;
        padding: 20px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .timeline-item:nth-child(even) .timeline-panel {
        float: right;
    }
    
    .timeline-item:nth-child(odd) .timeline-panel:before {
        border-left: 0;
        border-right: 15px solid #ccc;
        right: auto;
        left: -15px;
    }
    
    .timeline-item .timeline-badge {
        position: absolute;
        top: 20px;
        left: 50%;
        width: 50px;
        height: 50px;
        margin-left: -25px;
        border-radius: 50%;
        text-align: center;
        font-size: 1.4em;
        line-height: 50px;
        background-color: #003673;
        color: #fff;
        z-index: 100;
    }
    
    @media (max-width: 767px) {
        .timeline:before {
            left: 40px;
        }
        
        .timeline-item .timeline-panel {
            width: calc(100% - 90px);
            float: right;
        }
        
        .timeline-item .timeline-badge {
            left: 40px;
            margin-left: 0;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-nosotros">
    <div class="container">
        <h1>Sobre Nosotros</h1>
        <p>Somos una clínica veterinaria comprometida con el bienestar y la salud de tus mascotas. Nuestro equipo de profesionales trabaja con pasión y dedicación para ofrecer el mejor cuidado a tus compañeros peludos.</p>
    </div>
</div>

<!-- Nuestra Historia -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="section-title">Nuestra Historia</h2>
            <p>Veterinaria San Juan nació en 2000 con la visión de ofrecer servicios veterinarios de alta calidad en un ambiente cálido y acogedor. Lo que comenzó como una pequeña clínica, ha crecido hasta convertirse en un centro veterinario integral que ofrece una amplia gama de servicios para el cuidado de mascotas.</p>
            <p>A lo largo de los años, hemos mantenido nuestro compromiso con la excelencia y la atención personalizada, ganándonos la confianza de miles de familias que nos confían la salud de sus queridas mascotas.</p>
            <p>Hoy, Veterinaria San Juan es reconocida como una de las clínicas veterinarias líderes en la región, combinando tecnología de vanguardia con un equipo humano excepcional.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('vetsanjuan.jpg') }}" alt="Nuestra Historia" class="img-fluid rounded shadow" width="450px">
        </div>
    </div>
</div>

<!-- Nuestros Valores -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nuestros Valores</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card value-card p-4">
                    <div class="value-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title">Compasión</h4>
                        <p class="card-text">Tratamos a cada mascota con el amor y cuidado que merece, entendiendo el vínculo especial que existe entre las mascotas y sus familias.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card value-card p-4">
                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title">Excelencia</h4>
                        <p class="card-text">Nos esforzamos por ofrecer el más alto estándar de atención veterinaria, manteniéndonos actualizados con las últimas técnicas y tecnologías.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card value-card p-4">
                    <div class="value-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title">Comunidad</h4>
                        <p class="card-text">Creemos en construir relaciones duraderas con nuestros clientes y la comunidad, educando y promoviendo la tenencia responsable de mascotas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Nuestro Equipo -->
<div class="container my-5">
    <h2 class="section-title text-center mb-5">Nuestro Equipo</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="team-member">
                <img src="{{ asset('vete.jpg') }}" alt="Dr. Carlos Rodríguez">
                <h4>Dr. Carlos Rodríguez</h4>
                <p class="text-muted">Director Médico</p>
                <p>Especialista en medicina interna con más de 15 años de experiencia en el cuidado de pequeños animales.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="team-member">
                <img src="{{ asset('ciru.jpg') }}" alt="Dra. María López">
                <h4>Dra. María López</h4>
                <p class="text-muted">Cirujana</p>
                <p>Experta en cirugía veterinaria avanzada, con formación especializada en técnicas mínimamente invasivas.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="team-member">
                <img src="{{ asset('pelu.jpeg') }}" alt="Ana Martínez">
                <h4>Ana Martínez</h4>
                <p class="text-muted">Peluquera Canina</p>
                <p>Profesional certificada en estética canina con un enfoque en el bienestar y comodidad de las mascotas.</p>
            </div>
        </div>
    </div>
</div>

<!-- Nuestra Trayectoria -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nuestra Trayectoria</h2>
        <ul class="timeline">
            <li class="timeline-item">
                <div class="timeline-badge">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2010</h4>
                        <h4 class="subheading">Nuestros Inicios</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Apertura de la primera clínica VetSanJuan con servicios básicos de consulta y vacunación.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-item">
                <div class="timeline-badge">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2015</h4>
                        <h4 class="subheading">Expansión de Servicios</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Incorporación de servicios de cirugía avanzada, laboratorio propio y hospitalización 24 horas.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-item">
                <div class="timeline-badge">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2018</h4>
                        <h4 class="subheading">Tienda de Productos</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lanzamiento de nuestra tienda de productos especializados para mascotas, con asesoramiento personalizado.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-item">
                <div class="timeline-badge">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2023</h4>
                        <h4 class="subheading">Renovación Tecnológica</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Implementación de sistema de citas online y renovación de equipos de diagnóstico con tecnología de última generación.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- Nuestras Instalaciones -->
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 order-md-2">
            <h2 class="section-title">Nuestras Instalaciones</h2>
            <p>Contamos con instalaciones modernas diseñadas pensando en la comodidad y bienestar de las mascotas y sus dueños. Nuestras áreas incluyen:</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Consultorios equipados con tecnología avanzada</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Quirófano con equipos de monitorización de última generación</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Área de hospitalización confortable y segura</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Laboratorio para análisis rápidos y precisos</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sala de peluquería y estética canina</li>
                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Tienda con productos seleccionados de alta calidad</li>
            </ul>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="{{ asset('vetis.jpg') }}" alt="Nuestras Instalaciones" class="img-fluid rounded shadow">
        </div>
    </div>
</div>
@endsection