<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Conexión Educativa de Veracruz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
    <link rel="stylesheet" href="dependencies/bootstrap/css/bootstrap.min.css'">
    <link rel="stylesheet" href="dependencies/icofont/icofont.min.css">
    <link rel="stylesheet" href="dependencies/slick-carousel/css/slick.css">
    <link rel="stylesheet" href="dependencies/slick-carousel/css/slick-theme.css">
    <link rel="stylesheet" href="dependencies/magnific-popup/css/magnific-popup.css">
    <link rel="stylesheet" href="dependencies/sal.js/sal.css" type="text/css">
    <link rel="stylesheet" href="dependencies/select2/css/select2.min.css" type="text/css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Google Web Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body style="background:#F5F5F5;" class="sticky-header">

    <div id="wrapper" class="wrapper overflow-hidden">

        <!--=====================================-->
        <!--=          Header Menu Start       	=-->
        <!--=====================================-->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col mx-0 px-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-0 px-0">
                        <div class="row align-items-center mx-0 px-0 justify-content-md-center">
                            <div class="col-md-2 col-12 mx-0 px-0">
                                <a class="navbar-brand p-0" href="/">
                                    <img class="img-fluid" src="{{ asset('/img/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-4 text-right">
                                <button class="navbar-toggler " type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto menu">
                                        <li class="nav-item ">
                                            <a href="/universidades" class="nav-link" id="img-educacion"><img
                                                    class="img-menu" src="{{ asset('/img/7.png') }}"> Educación</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/empresa" class="nav-link" id="img-empresas"><img class="img-menu"
                                                    src="{{ asset('/img/8.png') }}"> Empresas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" id="img-gobierno"><img class="img-menu"
                                                    src="{{ asset('/img/9.png') }}"> Gobierno</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" id="img-sociedad"><img class="img-menu"
                                                    src="{{ asset('/img/10.png') }}"> Sociedad<br>Organizada</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" id="img-ambiente"><img class="img-menu"
                                                    src="{{ asset('/img/13.png') }}"> Medio<br>Ambiente</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/contacto" class="nav-link">Contacto</a>
                                        </li>
                                    </ul>

                                    <ul>
                                        <li class="login-btn">
                                            @if (Route::has('login'))
                                                @auth
                                                    @if (Auth::user()->role_id == 1)
                                                        <a class="nav-link active" href="/inicio">Inicio</a>
                                                    @else
                                                        <a class="nav-link active" href="/home">Inicio</a>
                                                    @endif
                                                @else
                                                    <a class="nav-link active" href="{{ route('login') }}">Iniciar
                                                        Sesión</a>

                                                    @if (Route::has('register'))
                                                        <a class="nav-link active"
                                                            href="{{ route('register') }}">Registro</a>
                                                    @endif
                                                @endauth
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                </div>
                </nav>
            </div>


            <!--=====================================-->
            <!--=          Banner Start       		=-->
            <!--=====================================-->
            <br>
            @yield('contenido')
            <!--=====================================-->
            <!--=        Footer Area Start       	=-->
            <!--=====================================-->
            <footer class="footer-wrap">
                <div class="main-footer">
                    <div class="container">
                        <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1">
                            <div class="col">
                                <div class="footer-box">
                                    <div class="footer-logo">
                                        <!--<a href="index.html"><img src="media/logo_dark.png" alt="Logo"></a>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-lg-center">
                                <div class="footer-box">
                                    <h3 class="footer-title">
                                        Links Importantes
                                    </h3>
                                    <div class="footer-link">
                                        <ul>
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="https://www.sev.gob.mx/">SEV</a></li>
                                            <li><a href="https://semsys.sev.gob.mx/peoe/pe.html">PEOE</a></li>
                                            <li><a href="/contacto">Contacto</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-lg-center">
                                <div class="footer-box">
                                    <h3 class="footer-title">
                                        Servicios
                                    </h3>
                                    <div class="footer-link">
                                        <ul>
                                            <li><a href="newsfeed.html">NewsFeed</a></li>
                                            <li><a href="user-timeline.html">Profile</a></li>
                                            <li><a href="user-friends.html">Friends</a></li>
                                            <li><a href="user-groups.html">Groups</a></li>
                                            <li><a href="forums.html">Forums</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-lg-center">
                                <div class="footer-box">
                                    <h3 class="footer-title">
                                        Followers
                                    </h3>
                                    <div class="footer-link">
                                        <ul>
                                            <li><a href="https://www.facebook.com/">facebook</a></li>
                                            <li><a href="https://twitter.com/">twitter</a></li>
                                            <li><a href="https://www.instagram.com/">instagram</a></li>
                                            <li><a href="https://www.youtube.com/">Youtube</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-copyright">All Rights Reserved</div>
                </div>
            </footer>

        </div>
    </div>
    <!-- Jquery Js -->
    <script src="dependencies/jquery/js/jquery.min.js"></script>
    <script src="{{asset('/dependencies/popper.js/js/popper.min.js')}}"></script>
    <script src="dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
    <script src="dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
    <script src="dependencies/slick-carousel/js/slick.min.js"></script>
    <script src="dependencies/sal.js/sal.js"></script>
    <script src="dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="dependencies/bootstrap-validator/js/validator.min.js"></script>
    <script src="dependencies/select2/js/select2.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>
    @yield('js')
</body>

</html>
