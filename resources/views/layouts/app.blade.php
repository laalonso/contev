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
    <link href="{{asset('/dist/css/style.min.css')}}" rel="stylesheet">
    <!--
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}?{{rand(1000,9000)}}">
    -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
    <link rel="stylesheet" href="{{asset('dependencies/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/slick-carousel/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/slick-carousel/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/magnific-popup/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/sal.js/sal.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/mcustomscrollbar/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('dependencies/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
<!-- Google Web Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

    @yield('meta')
</head>
  <body style="background:#F5F5F5;"  >
    <div class="container" >
      <div class="row">
          <div class="col">
          <header class="fixed-header">
              <div class="header-menu">
                  <div class="navbar">
                      <div class="nav-item d-none d-sm-block">
                          <div class="header-logo">
                              <a href="/"><img style="width:80px;border-radius:50%;box-shadow: -5px 3px 20px black;
" class="img-fluid" src="{{asset('img/logo2.jpeg')}}" alt="Conexión"></a>
                          </div>
                      </div>
                      <div class="nav-item nav-top-menu">
                          <nav id="dropdown" class="template-main-menu">
                              <ul class="menu-content">
                                  
                              @auth
                              @if(Auth::user()->role_id==1)
                                    <li class="header-nav-item">
                                      <a href="/home" class="menu-link active">Inicio</a>
                                  </li>
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Usuarios</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="{{ url('/root/user/all') }}">Usuarios</a>
                                          </li>
                                          <li>
                                              <a href="{{ url('/root/rol/all') }}">Roles</a>
                                          </li>                                                 
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Instituciones</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="{{ url('/root/university/registro') }}">Registradas</a>
                                          </li>
                                          <li>
                                              <a href="{{ url('/root/university/encargados') }}">Gestores</a>
                                          </li>
                                          <li>
                                              <a href="{{ url('/root/university/all') }}">PEOE</a>
                                          </li>
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Empresas</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="{{ url('/root/enterprise/all') }}">Empresas</a>
                                          </li>
                                          <li>
                                              <a href="{{ url('/root/enterprise/encargadoss') }}">Encargados</a>
                                          </li>                                                 
                                      </ul>                                          
                                  </li>
                              @endif
                              
                              @if(Auth::user()->role_id==2)
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Servicios</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/university/services/create">Agregar servicio</a>
                                          </li>
                                          <li>
                                              <a href="/university/services/">Listar servicios</a>
                                          </li>                                                 
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Proyectos</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/university/projects/create">Agregar proyecto</a>
                                          </li>
                                          <li>
                                              <a href="/university/projects">Listar proyectos</a>
                                          </li>
                                          <li>
                                              <a href="/university/lineas">Lineas investigación</a>
                                          </li>
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Estudiantes</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="{{route('students.create')}}">Agregar estudiantes</a>
                                          </li>
                                          <li>
                                              <a href="{{route('students.index')}}">Listar estudiantes</a>
                                          </li>                                                 
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Empresas</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/university/empresas/lista">Empresas</a>
                                          </li>
                                          <li>
                                              <a href="/university/empresas/servicios">Servicios</a>
                                          </li> 
                                          <li>
                                              <a href="/university/empresas/servicios/listapostulaciones">Postulaciones</a>
                                          </li>
                                          <li>
                                              <a href="/university/empresas/vacantes">Vacantes</a>
                                          </li> 
                                      </ul>                                          
                                  </li>                              
                              @endif
                              @if(Auth::user()->role_id==3)
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Evaluaciones</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/estudiantes/evaluaciones/lista">Lista</a>
                                          </li>
                                          <li>
                                              <a href="/estudiantes/create">Agregar</a>
                                          </li>                                          
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Empresas</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/estudiantes/empresas/lista">Empresas</a>
                                          </li>
                                          <li>
                                              <a href="/estudiantes/empresas/vacantes">Vacantes</a>
                                          </li>                                          
                                      </ul>                                          
                                  </li>
                                  
                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Perfil</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/estudiantes">Ver</a>
                                          </li>
                                          <li>
                                              <a href="/estudiantes/lista/postulaciones">Listar postulaciones</a>
                                          </li>
                                          @if(App\Test::all()->where('student_id',Auth::user()->student->id)->count()==0)
                                            <li>
                                                <a href="/estudiante/test/create">Realizar test</a>
                                            </li>
                                          @endif
                                      </ul>                                          
                                  </li>
                              @endif
                              @if(Auth::user()->role_id==4)
                                
                           

                                  <li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Servicios</a>
                                      <ul class="sub-menu">
                                        <li>
                                        <a  href="/enterprise/services/create">Solicitar un servicio</a>
                                        </li>
                                        <li>
                                         <a  href="/enterprise/services/">Servicios solicitados</a>
                                        </li>
                                     </ul>
                                  </li> 
                             
                              <li class="header-nav-item">
                                      <a  href="#" class="menu-link have-sub">  Vacantes </a>
                                       <ul  class="sub-menu">
                                            <li>
                                               <a href="/enterprise/vacancies/create">Agregar vacante</a>
                                            </li>
                                            <li>
                                                <a href="/enterprise/vacancies/">Lista de vacante</a>
                                            </li>  
                                            <li>
                                                <a href="{{route('studentss.index')}}">Buscar candidato</a>
                                           </li>
                                 </ul>
                             </li>  
                             
                            <li class="header-nav-item">
                                <a href="#" class="menu-link have-sub"> Universidades</a>
                                    <ul class="sub-menu">
                                        <li>  
                                          <a  href="/enterprise/universidades/lista">Lista de Universidades</a>
                                        </li>  
                                        <li>
                                          <a  href="/enterprise/universidades/proyectos">Lista de Proyectos</a>
                                        </li>                             
                                        <li>    
                                          <a  href="/enterprise/universidades/servicios">Lista de Servicios</a>
                                        </li>  
                                        <li>          
                                           <a  href="/enterprise/universidades/servicios/listapostulacionesuni">Postulaciones de Servicios</a>
                                        </li>  
                                    </ul>
                        </li>
                        
                       
                        
                        <li class="header-nav-item">
                                <a href="#" class="menu-link have-sub">Perfil</a>
                                <ul class="sub-menu">
                                     <li>
                                      <a  href="/empresas">Ver</a>
                                   </li>  
                                   <li> 
                                    <a  href="/enterprise/servicess/">Mis servicios</a>
                                   </li>
                                </ul>
                        </li>
                       
                              @endif
                              <!--sociedad organizada-->
                              @if(Auth::user()->role_id==5)
                                  <li li class="header-nav-item">
                                      <a href="#" class="menu-link have-sub">Universidades</a>                      
                                      <ul class="sub-menu">
                                          <li>
                                              <a href="/enterprise/universidades/lista">Listar universidades</a>
                                          </li>
                                          <li>
                                              <a href="/enterprise/universidades/proyectos">Listar proyectos</a>
                                          </li> 
                                          <li>
                                              <a href="/enterprise/universidades/servicios">Listar servicios</a>
                                          </li> 
                                      </ul>                                          
                                  </li>
                              @endif
                              </ul>
                          </nav>
                      </div>
                      @endauth
@php
  $user=Auth::user();
  if($user){
    $uni=App\University::where("user_id",$user->id)->first();
  }
@endphp
            @auth
                <div class="nav-item header-control">
                    @if(Auth::user()->role_id==1)
                    @php
                        $notificaciones=App\AdminNotificacion::where('estatus',0)->get();
                        $total=$notificaciones->count();
                        $notificaciones=$notificaciones->take(3);
                    @endphp
                    <div class="inline-item d-flex align-items-center">

                      <div class="dropdown dropdown-notification">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icofont-notification"></i><span class="notify-count">{{$total}}</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="item-heading">
                                        <h6 class="heading-title">Notificaciones</h6>
                                        <div class="heading-btn">
                                            <a href="/root/university/notificaciones/marcar/leidas">Marcar como leídas</a>
                                        </div>
                                    </div>
                                    <div class="item-body">
                                    @foreach($notificaciones as $notificacion)
                                        @php
                                            $institucion=App\University::where('university_id',$notificacion->university_id)->first();
                                            $gestor=App\User::find($institucion->user_id);
                                                $nombre_gestor=$gestor->name." ".$gestor->f_surname." ".$gestor->s_surname;
                                              
                                        @endphp
                                        <a href="/root/university/notificaciones/ver/{{encrypt($notificacion->id)}}" class="media">
                                            <div class="item-img">
                                                <img width="30" src="{{asset('/img/'.$institucion->logo)}}" alt="Notify">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="item-title">{{$nombre_gestor}}</h6>
                                                <p>{{$notificacion->created_at}}</p>
                                                <p>{{$notificacion->descripcion}}</p>
                                            </div>
                                        </a>  
                                    @endforeach   
                                    </div>
                                    <div class="item-footer">
                                        <a href="/root/university/notificaciones" class="view-btn">Ver todas las notificaciones</a>
                                    </div>
                                </div>
                            </div><!-- Fin dropdown dropdown-notification -->
                        </div><!-- inline-item d-flex align-items-center -->

                    @endif
                   
                            <div class="inline-item">                        
                              <div class="dropdown dropdown-admin">
                                  <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                      <span class="media">
                                          <span class="item-img">
                                              @if(isset($uni->logo))
                                                <img style="width:45px;" src="{{asset('img/'.$uni->logo)}}" alt="Chat">
                                              @else
                                                <img src="{{asset('media/figure/chat_5.jpg')}}" alt="Chat">
                                              @endif
                                              <span class="acc-verified"><i class="icofont-check"></i></span>
                                          </span>
                                          <span class="media-body">
                                          @if(isset($uni))
                                              <span id="nombre_corto" subsistema="{{$uni->university_id}}" class="item-title"></span>
                                          @endif
                                          </span>
                                      </span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <ul class="admin-options">
                                          <li><a href="#">{{ @Auth::user()->name }} {{ @Auth::user()->paterno }} {{ @Auth::user()->materno }}</a></li>
                                        @if(@Auth::user()->role_id==2)
                                          <li><a href="/university/perfil">Perfil gestor del conocimiento</a></li>
                                        @endif
                                          <li><a href="/editarPassword">Actualizar password</a></li>
                                          <li><a href="{{ route('aviso') }}">Aviso de privacidad</a></li>
                                          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar sesión</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>         
                                            </li>
                                      </ul>
                                  </div>
                              </div>
                          </div><!-- Fin inline-item -->                          
</div><!-- fIN nav-item header-control -->
                      @endauth
                  </div>
              </div>
          </header>
          </div>
      </div>
      
        <main style="padding-bottom: 250px !important;" class="py-4">
            <br><br><br>
            @yield('content')
        </main> 
    </div>
    
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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/3.3.11/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    
    <script src="{{asset('dependencies/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dependencies/imagesloaded/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('dependencies/isotope-layout/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('dependencies/slick-carousel/js/slick.min.js')}}"></script>
    <script src="{{asset('dependencies/sal.js/sal.js')}}"></script>
    <script src="{{asset('dependencies/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('dependencies/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('dependencies/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('dependencies/elevate-zoom/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('dependencies/bootstrap-validator/js/validator.min.js')}}"></script>

    <script>
      $(document).ready(function(){
        var id_subsistema=$("#nombre_corto").attr("subsistema");
            if(id_subsistema){
                $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_subsistema, function(data){
                        $("#nombre_corto").text(data[0].Abreviatura);
                    });
            }
      });
    </script>
    @yield('js')
</body>
</html>
