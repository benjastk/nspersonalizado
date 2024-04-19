@extends('frontend.layouts.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <!--<div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Cuida tu cuerpo</span>
                                <h1>Puedes <strong>Entrenar </strong> todos los dias</h1>
                                <a href="#contact-section" class="primary-btn">Mas información</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Elige tu camino hacia la transformación</span>
                                <h1>Inicia hoy tu <strong>transformación </strong></h1>
                                <a href="#contact-section" class="primary-btn">¡Comienza ahora!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad" id="choseus-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Que hacemos</span>
                        <h2>Sumérgete en la experiencia fitness, con Nicolas cada entrenamiento se convertirá en un viaje trasnformador</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Rutina de entrenamiento en gym</h4>
                        <p>Entrena en tu gym favorito con la mejor rutina para lograr tus objetivos.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>Plan de nutrición</h4>
                        <p>Asesoría nutricional para lograr tu cambio y fomentar hasta un 70% tu transformación.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>Plan profesional</h4>
                        <p>Asesoria, acompañamiento y feedback de un Preparador físico técnico profesional, para responder todas tus dudas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>Único a tus necesidades</h4>
                        <p>Rutinas para entrenar donde sea, entrena con tu peso corporal y consigue el cambio que deseas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad" id="classes-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Entrenamientos</span>
                        <h2>NUESTROS TIPOS DE ENTRAMIENTO</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-1.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Musculación</span>
                            <h5>Obtén masa muscular</h5>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-2.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Cardio Hiit</span>
                            <h5>Pierde grasa</h5>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-3.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Abdominales</span>
                            <h5>Tonifica</h5>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-4.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Entrenamiento para deportistas</span>
                            <h4>Mejora el rendimiento en tu deporte favorito</h4>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-5.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Entrena en casa o donde quieras</span>
                            <h4>Peso Corporal</h4>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="img/banner-bg.jpg" id="contact-section">
        <div class="container" style="background-color: rgba(0, 0, 0, 0.5);padding: 51px;">
            <div class="row">
                <!--<div class="contact-section spad" id="contact-section" style="width: 100%">-->
                    <div class="bs-text">
                        <h2>Dejanos tus datos</h2>
                        <div class="bt-tips">Elige tu camino hacia la transformación</div>
                    </div>                                    
                    <form action="{{ route('formulario-contacto')}}" method="post" style="width: 100%; text-align: center;">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="nombre" placeholder="Nombre" style="width: 80%; margin: auto;"><br><br>
                                <input class="form-control" type="text" name="email" placeholder="Correo electronico" style="width: 80%; margin: auto;"><br><br>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="telefono" placeholder="Telefono" style="width: 80%; margin: auto;"><br><br>
                                <input class="form-control" type="text" name="mensaje" placeholder="Mensaje" style="width: 80%; margin: auto;">
                            </div>
                            <div class="col-lg-12">
                            <br>
                                <button class="btn btn-primary form-control" style="width: 30%" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                <!--</div>-->
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad" id="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Nuestros planes</span>
                        <h2>Elige el plan que mas te guste</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="ps-item">
                        <h3>Mensual/Trismestral</h3>
                        <div class="pi-price">
                            <h2>$40.000</h2>
                            <span>Normal</span>
                        </div>
                        <ul>
                            <li>Plan de entrenamiento</li>
                            <li>Rutina y lista de ejercicios</li>
                            <li>Videos de los ejercicios</li>
                            <li>Chat en WhatsApp</li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        </ul>
                        <a href="#contact-section" class="primary-btn pricing-btn">¡Lo Quiero!</a>
                        <!--<a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>-->
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="ps-item">
                        <h3>Mensual/Trismestral</h3>
                        <div class="pi-price">
                            <h2>$80.000</h2>
                            <span>Premium</span>
                        </div>
                        <ul>
                            <li>Plan de entrenamiento</li>
                            <li>Rutina y lista de ejercicios</li>
                            <li>Videos de los ejercicios</li>
                            <li>Chat en WhatsApp</li>
                            <li>Asesoría Nutricional</li>
                            <li>Pauta de alimentación </li>
                        </ul>
                        <a href="#contact-section" class="primary-btn pricing-btn">¡Lo Quiero!</a>
                        <!--<a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    <!--<div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-1.jpg">
                <a href="img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-2.jpg">
                <a href="img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-3.jpg">
                <a href="img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-4.jpg">
                <a href="img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-5.jpg">
                <a href="img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-6.jpg">
                <a href="img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>-->
    <section class="contact-section spad" id="contact-section">
        <div class="container">
            <div class="section-title contact-title">
                <span>Contactame</span>
                <!--<h2>Deja tus datos</h2>-->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                            <p>Smart Fit Escuela Militar</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                            <a href="https://wa.me/56978335351"><li>+56 9 7833 5351</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-widget">
                        <div class="cw-text email">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/nicolasfitness.personalizado"><p>nicolasfitness.personalizado@gmail.com</p></a>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:nicolasfitness.personalizado@gmail.com"><p>nicolasfitness.personalizado</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->

    <!-- Team Section Begin -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-1.jpg">
                <a href="img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-2.jpg">
                <a href="img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-3.jpg">
                <a href="img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-4.jpg">
                <a href="img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-5.jpg">
                <a href="img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-6.jpg">
                <a href="img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/nicolasfitness.personalizado"><p>nicolasfitness.personalizado</p></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <a href="https://wa.me/56978335351"><li>+56 9 7833 5351</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:nicolasfitness.personalizado@gmail.com"><p>nicolasfitness.personalizado@gmail.com</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="img/logonico2.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fs-about">
                        <p>Potencia tu rendimiento con nuestros servicios de entrenamiento personalizado! Nicolas, se dedica a ofrecerte programas de entrenamiento 
                            diseñados para alcanzar tus objetivos de fitness de manera eficaz y segura. Ya sea que busques perder peso, ganar masa muscular o mejorar 
                            tu rendimiento deportivo. ¡Únete a nosotros en el camino hacia una vida más saludable y activa hoy mismo</p>
                        <div class="fa-social">
                            <!--<a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>-->
                            <a href="https://www.instagram.com/nicolasfitness.personalizado"><i class="fa fa-instagram"></i></a>
                            <a href="mailto:nicolasfitness.personalizado@gmail.com"><i class="fa fa-envelope-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Modificado por <i class="fa fa-heart" aria-hidden="true"></i> <a href="https://benjaminperez.cl" target="_blank">Benjamin Perez</a>
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->
@endsection
