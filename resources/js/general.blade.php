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
    <link rel="stylesheet" href="dependencies/bootstrap/css/bootstrap.min.css">
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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

</head>

<body style="background:#F5F5F5;" class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="icofont-bubble-up"></i>
    </a>
    <!-- Preloader Start Here -->
    <!-- <div id="preloader"></div> -->
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper overflow-hidden">

        <!--=====================================-->
        <!--=          Header Menu Start       	=-->
        <!--=====================================-->
        <header class="header">
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="">
                                <a href="/"><img src="{{asset('/img/logo.png')}}" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-sm-7 col-8 d-flex justify-content-xl-start justify-content-center">
                            <div class="mobile-nav-item hide-on-desktop-menu">
                                <div class="mobile-toggler">
                                    <button type="button" class="mobile-menu-toggle">
                                        <i class="icofont-navigation-menu"></i>
                                    </button>
                                </div>
                                <div class="mobile-logo">
                                    <a href="index.html">
                                        <img src="media/mobile_logo.png" alt="Logo">
                                    </a>
                                </div>
                            </div>
                            <nav id="dropdown" class="template-main-menu">
                                <button type="button" class="mobile-menu-toggle mobile-toggle-close">
                                    <i class="icofont-close"></i>
                                </button>
                                <ul class="menu-content">
                                  
                                    <li class="header-nav-item">
                                        <a href="#" class="menu-link have-sub">Educación</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="/universidades">Registradas</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="header-nav-item">
                                        <a href="/empresa" class="menu-link have-sub">Empresas</a>
                                        <ul class="mega-menu mega-menu-col-2">
                                            <li>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="">Submenu</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Submenu</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="">Submenu</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Submenu</a>
                                                    </li>
        
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="header-nav-item">
                                        <a href="#" class="menu-link have-sub">Gobierno</a>
                                     </li>
                                     <li class="header-nav-item">
                                        <a href="#" class="menu-link have-sub">Sociedad organizada</a>
                                     </li>
                                     <li class="header-nav-item">
                                        <a href="#" class="menu-link have-sub">Medio Ambiente</a>
                                     </li>
                                    <!--<li class="hide-on-mobile-menu"></li>
                                    <li class="header-nav-item hide-on-desktop-menu"></li>-->
                                    
                                   
                                    
                                    <li class="header-nav-item">
                                        <a href="/contacto" class="menu-link">Contacto</a>
                                    </li>

                                    <li class="header-nav-item">
                                        <a href="/" class="menu-link active">Home</a>
                                    </li>

                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-sm-5 col-4 d-flex justify-content-end">
                            <div class="header-action">
                                <ul>
                                    <li class="login-btn">
                                    @if (Route::has('login'))
                                            @auth
                                                @if(Auth::user()->role_id==1)
                                                    <a class="nav-link active" href="/inicio">Inicio</a>
                                                @else
                                                    <a class="nav-link active" href="/home">Inicio</a>
                                                @endif
                                            @else
                                                <a class="nav-link active" href="{{ route('login') }}">Iniciar Sesión</a>

                                                @if (Route::has('register'))
                                                    <a class="nav-link active" href="{{ route('register') }}">Registro</a>
                                                @endif
                                            @endauth
                                    @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
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
                                    Important Links
                                </h3>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="index.html">Inicio</a></li>
                                        <li><a href="about-us.html">Servicios</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="contact.html">Contacts</a></li>
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
                <div class="footer-copyright">Copy© cirkle 2021. All Rights Reserved</div>
            </div>
        </footer>



        <!--=====================================-->
        <!--=      Header Search Start          =-->
        <!--=====================================-->
        <div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <form class="header-search-form">
                <input type="search" value="" placeholder="Search here..." />
                <button type="submit" class="search-btn">
                    <i class="flaticon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Jquery Js -->
    <script src="dependencies/jquery/js/jquery.min.js"></script>
    <script src="dependencies/popper.js/js/popper.min.js"></script>
    <script src="dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
    <script src="dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
    <script src="dependencies/slick-carousel/js/slick.min.js"></script>
    <script src="dependencies/sal.js/sal.js"></script>
    <script src="dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="dependencies/bootstrap-validator/js/validator.min.js"></script>
    <script src="dependencies/select2/js/select2.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>

    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>
    @yield('js')
</body>

</html>