<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MASIVO XML</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/welcome/assets/favicon.ico')}}" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/welcome/css/styles.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{route('welcome')}}"><img src="{{asset('assets/welcome/assets/img/masivo_logo.png')}}" alt="logo" width="200"
                    height="50"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Requisitos</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#services">Services</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Planes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('licencias.comprar')}}">Comprar</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome-policy')}}">Política</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('blog.index')}}">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead2">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">¡Adquiere tu licencia!</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Los beneficios que contiene el software te llevará un nivel arriba de las demás empresas.</p>
                </div>
            </div>
        </div>
    </header>
    <!-- Plans-->
    <section class="page-section bg-dark text-white" id="plans">
        @yield('section')
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Contacto</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Horario de Atención</h3>
                        <p class="text-muted mb-0">9:00 A.M. a 5:00 P.M.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Ventas</h3>
                        <p class="text-muted mb-0">ventas@masivoxml.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Soporte</h3>
                        <p class="text-muted mb-0">soporte@masivoxml.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-envelope fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Email</h3>
                        <p class="text-muted mb-0">contacto@masivoxml.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-telephone fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Teléfono</h3>
                        <p class="text-muted mb-0">Tel. Cel.: 961 612 6245 ext. 3
                            Oficina: (961) 225 9998</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-geo-alt fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Dirección</h3>
                        <p class="text-muted mb-0">Av. Platino No. 173, Fraccionamiento, Valle Dorado, Col. Rosario Poniente,,Tuxtla Gutiérrez, Chiapas C.P. 29014</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-check-lg fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Crecimiento</h3>
                        <p class="text-muted mb-0">¡Entra al mundo digital y haz crecer tu empresa!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Made with Love</h3>
                        <p class="text-muted mb-0">Ámbar Rojo Studios</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2022 - +IVO XML</div>
        </div>
    </footer>

    

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('assets/welcome/js/scripts.js')}}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    @stack('js')
</body>

</html>
