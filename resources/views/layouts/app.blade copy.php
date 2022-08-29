<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="my-0">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
     <link rel="shortcut icon" href="{{asset('img/aievac-logo.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}?{{rand(1000,9000)}}">
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @yield('meta')
</head>
  <body style="background:#F5F5F5;"  >
        <div class="container" >
          <div class="row">
            <div class="col">
              <nav class="navbar navbar-expand-md colorin1">
                <a class="navbar-brand" href="{{ url('/') }}">
                @if(Route::current()->uri !== 'login')
                    <img class="logo2"  src="{{asset('img/logo.svg')}}" alt="">
                @else
                    <img class="logo"  src="{{asset('img/logo.svg')}}" alt="">
                @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{route('acerca')}}">Acerca de</a>
                        </li>
                      
                    @auth                    
                    @if(Auth::user()->role_id==1)

                        <li class="nav-item dropdown">

                             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              Usuarios
                            </a>
                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/root/user/all') }}" >Usuarios</a>
                                <a href="{{ url('/root/rol/all') }}" class="dropdown-item">Roles</a>
                            </div>

                        </li>

                        <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             Univesidades
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="{{ url('/root/university/all') }}" class="dropdown-item">Universidades</a></li>
                                <li><a href="{{ url('/root/university/encargados') }}" class="dropdown-item">Encargados</a></li>
                            </ul>
                        </li>

                          <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Empresas</a>
                            <div class="dropdown-menu">   
                                <a href="{{ url('/root/enterprise/all') }}" class="dropdown-item">Empresas</a>
                                 <a href="{{ url('/root/enterprise/encargadoss') }}" class="dropdown-item">Encargados</a>
                            </div>
                        </li>
                        
                        @endif

                        @if(Auth::user()->role_id==2)
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Servicios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/university/services/create">Agregar Servicio</a>
                                  <a class="dropdown-item" href="/university/services/">Lista de Servicios</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Proyectos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/university/projects/create">Agregar Proyecto</a>
                                  <a class="dropdown-item" href="/university/projects">Lista de Proyectos</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Estudiantes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('students.create')}}">Agregar Estudiantes</a>
                                  <a class="dropdown-item" href="{{route('students.index')}}">Lista de Estudiantes</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Empresas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/university/empresas/lista">Empresas</a>
                                  <a class="dropdown-item" href="/university/empresas/servicios">Servicios</a>
                                  <a class="dropdown-item" href="/university/empresas/servicios/listapostulaciones">Postulaciones</a>
                                  <a class="dropdown-item" href="/university/empresas/vacantes">Vacantes</a>
                                </div>
                        </li>
                        
                                
                    @endif
                    @if(Auth::user()->role_id==3)
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Evaluaciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/estudiantes/evaluaciones/lista">Lista</a>
                                    <a class="dropdown-item" href="/estudiantes/create">Agregar</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Empresas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/estudiantes/empresas/lista">Empresas</a>
                                  <a class="dropdown-item" href="/estudiantes/empresas/vacantes">Vacantes</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Perfil
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/estudiantes">Ver</a>
                                  <a class="dropdown-item" href="/estudiantes/lista/postulaciones">Lista de Postulaciones</a>
                @if(App\Test::all()->where('student_id',Auth::user()->student->id)->count()==0)
                                  <a class="dropdown-item" href="/estudiante/test/create">Realizar Test</a>
                @endif
                                </div>
                        </li>
                @endif
                <!--Empresa-->

                            @if(Auth::user()->role_id==4)
                     
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Servicios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="/enterprise/services/create">Solicitar un servicio</a>
                                   <a class="dropdown-item" href="/enterprise/services/">Servicios solicitados</a>
                             
                                </div>
                             </li> 
                             
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Vacantes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="/enterprise/vacancies/create">Agregar vacante</a>
                                   <a class="dropdown-item" href="/enterprise/vacancies/">Lista de vacante</a>
                                      <a class="dropdown-item"  href="{{route('studentss.index')}}">Buscar candidato</a>
                             
                                </div>
                             </li>  
                             
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Universidades
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/enterprise/universidades/lista">Lista de Universidades</a>
                                  <a class="dropdown-item" href="/enterprise/universidades/proyectos">Lista de Proyectos</a>
                                  <a class="dropdown-item" href="/enterprise/universidades/servicios">Lista de Servicios</a>
                                  <a class="dropdown-item" href="/enterprise/universidades/servicios/listapostulacionesuni">Postulaciones de Servicios</a>
                                </div>
                        </li>
                        
                       
                        
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Perfil
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/empresas">Ver</a>
                                  <a class="dropdown-item" href="/enterprise/servicess/">Mis servicios</a>
                                
                        </li>
                           
                @endif
                

                <!--sociedad organizada-->
                @if(Auth::user()->role_id==5)
                      
                         <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Universidades
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="/enterprise/universidades/lista">Lista de Universidades</a>
                           <a class="dropdown-item" href="/enterprise/universidades/proyectos">Lista de Proyectos</a>
                           <a class="dropdown-item" href="/enterprise/universidades/servicios">Lista de Servicios</a>
                           </div>
                 </li>
                                  
         @endif
                
                
                @endauth                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                        @if(Route::current()->uri !== 'login')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 Usuario <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">
                                        {{ Auth::user()->role->name }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">
                                      {{ Auth::user()->name }} {{ Auth::user()->f_surname }} {{ Auth::user()->s_surname }}
                                    </a>
                                    @if(Auth::user()->role_id==2)
                                    <a class="dropdown-item" href="/university/perfil">
                                        Perfil Universidad
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('aviso') }}">
                                        Aviso de Privacidad
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      </div>
      </div>
      
        <main style="padding-bottom: 250px !important;" class="py-4">
            @yield('content')
        </main>
        
        <!-- FOOTER -->
        <div style="background:#202349;height:100px;color:#FFFFFF;height:100%;margin:0px" class="row">
          <div style="text-align:center;" class="col">
            <img style="width:100%;" class="img-fluid" src="{{asset('img/sev2.png')}}" alt="">
          </div>
          <div style="text-align:center;" class="col">
            <img style="width:100%;" class="img-fluid" src="{{asset('img/semsys2.png')}}" alt="">
          </div>
          <div style="text-align:center;" class="col">
            <span class="align-middle">
              <br><center><h5 class="txt-footer_l">WWW.<a class="pag" href="https://www.sev.gob.mx/" target="_blank" style="color: #d6af23;">SEV</a>.GOB.MX</h5></center>
              <center><p >Algunos derechos reservados © 2020</p></center>
            </span>
          </div> 
          <div style="text-align:center;" class="col">
            <img style="width:100%;" class="img-fluid" src="{{asset('img/det2.png')}}" alt="">
          </div>
          <div style="text-align:center;" class="col">
            <img style="width:100%;" class="img-fluid" src="{{asset('img/aievac2.png')}}" alt="">
          </div>       
        </div>
    </div> 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/3.3.11/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    @yield('js')
</body>
</html>
