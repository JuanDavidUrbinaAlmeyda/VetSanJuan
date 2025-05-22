@extends('layouts.navfoot')
@section('title')
<title>Contacto - VetSanJuan</title>
@endsection
@section('styles')
<style>
    .hero-contacto {
        background: linear-gradient(rgba(0, 54, 115, 0.7), rgba(0, 54, 115, 0.7));
        background-size: cover;
        padding: 100px 0;
        color: white;
        text-align: center;
    }

    .hero-contacto h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color:white;
    }

    .hero-contacto p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .contact-info-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
        padding: 2rem;
    }

    .contact-info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .contact-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #003673;
        border-radius: 50%;
        color: white;
        font-size: 1.8rem;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #e2ae23;
        box-shadow: 0 0 0 0.25rem rgba(226, 174, 35, 0.25);
    }

    .btn-contacto {
        background-color: #003673;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-contacto:hover {
        background-color: #e2ae23;
        color: #003673;
        transform: translateY(-3px);
    }

    .map-container {
        height: 450px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .faq-item {
        margin-bottom: 1.5rem;
    }

    .faq-question {
        font-weight: 600;
        color: #003673;
        margin-bottom: 0.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-answer {
        color: #6c757d;
        padding-left: 1.5rem;
        border-left: 3px solid #e2ae23;
        margin-top: 0.5rem;
        display: none;
    }

    .faq-item.active .faq-answer {
        display: block;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-contacto">
    <div class="container">
        <h1>Contáctanos</h1>
        <p>Estamos aquí para responder tus preguntas y ayudarte con el cuidado de tus mascotas. No dudes en ponerte en contacto con nosotros.</p>
    </div>
</div>

<!-- Información de Contacto -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card contact-info-card text-center">
                <div class="contact-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h4>Dirección</h4>
                <p>Cl. 43 #22 - 100<br>Girón, Bucaramanga</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card contact-info-card text-center">
                <div class="contact-icon">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <h4>Teléfono</h4>
                <p>+57 315 500 7311<br>+57 350 813 1620</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card contact-info-card text-center">
                <div class="contact-icon">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <h4>Email</h4>
                <p>veterinariasanjuan77@gmail.com</p>
            </div>
        </div>
    </div>
</div>

<!-- Horarios -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #003673; font-weight: 700;">Horarios de Atención</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <div class="row mb-3 border-bottom pb-3">
                            <div class="col-6">
                                <h5 class="mb-0">Lunes a Sábados</h5>
                            </div>
                            <div class="col-6 text-end">
                                <p class="mb-0 fw-bold">8:00 AM - 7:00 PM</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h5 class="mb-0">Domingos y Festivos</h5>
                            </div>
                            <div class="col-6 text-end">
                                <p class="mb-0 fw-bold">8:00 AM - 1:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulario de Contacto -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h2 style="color: #003673; font-weight: 700; margin-bottom: 1.5rem;">Envíanos un Mensaje</h2>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Asunto">
                <textarea class="form-control" rows="5" placeholder="Mensaje" required></textarea>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="privacyCheck" required>
                    <label class="form-check-label" for="privacyCheck">
                        Acepto la política de privacidad y el tratamiento de mis datos
                    </label>
                </div>
                <button type="submit" class="btn btn-contacto">
                    <i class="bi bi-send-fill me-2"></i> Enviar Mensaje
                </button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="map-container">
                <!-- Aquí puedes insertar un iframe de Google Maps con tu ubicación -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0307845928766!2d-73.16954607489868!3d7.073763794870283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e683f003831e031%3A0xae8a730ac015ae5f!2sVeterinaria%20San%20Juan!5e0!3m2!1ses!2sco!4v1716151234567!5m2!1ses!2sco" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Preguntas Frecuentes -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #003673; font-weight: 700;">Preguntas Frecuentes</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="faq-item active">
                    <div class="faq-question">
                        <span>¿Necesito agendar una cita para la consulta veterinaria?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Sí, recomendamos agendar una cita previa para garantizar una atención oportuna. Puedes hacerlo por teléfono o a través de nuestro sistema de citas online.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>¿Cómo puedo agendar un servicio de peluquería?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Puedes agendar nuestros servicios de peluquería canina por teléfono o visitando nuestra clínica. Recomendamos hacerlo con al menos 2-3 días de anticipación, especialmente en temporadas de alta demanda.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>¿Realizan envíos de productos a domicilio?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Sí, realizamos envíos de productos de nuestra tienda a domicilio. El costo y tiempo de entrega dependerá de tu ubicación. Consulta con nuestro equipo para más detalles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para las FAQs -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentElement;
                faqItem.classList.toggle('active');
            });
        });
    });
</script>
@endsection