@extends('layouts.app')

@section('content')
@php
    $user=Auth::user();
    $uni=App\University::where('user_id',$user->id)->first();
    $proyectos=App\Project::where('university_id',$uni->university_id)->count();
    $estudiantes=App\Student::where('subsistema_id',$uni->university_id)->count();
    $servicios=App\UniversityService::where('university_id',$uni->university_id)->count();
@endphp
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Banner Area Start -->
                @if($uni->banner)
                    <div style="background-image: url('{{asset('img/'.$uni->banner)}}');background-size: 100%;"  class="banner-user">
                @else
                    <div  class="banner-user">
                @endif
                    <div class="banner-content">
                        <div class="media">
                            <div class="item-img">
                                @if($uni->logo)
                                    <img style="width:115px;" src="{{asset('img/'.$uni->logo)}}" alt="User">
                                @else
                                    <img src="{{asset('media/banner/user_1.jpg')}}" alt="User">
                                @endif
                            </div>
                            <div class="media-body">
                                <h3 class="item-title nombre">NOMBRE REGISTRADO</h3>
                                <ul class="item-social">
                                    <li><a id="facebook" href="#" class="bg-fb"><i class="icofont-facebook"></i></a></li>
                                    <li><a id="twitter" href="#" class="bg-twitter"><i class="icofont-twitter"></i></a></li>
                                    <li><a id="youtube" href="#" class="bg-youtube"><i class="icofont-brand-youtube"></i></a></li>
                                </ul>
                                <ul class="user-meta">
                                    <li>Proyectos: <span>{{$proyectos}}</span></li>
                                    <li>Estudiantes: <span>{{$estudiantes}}</span></li>
                                    <li>Servicios: <span>{{$servicios}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-8">
                        <div class="block-box user-about">
                            <div class="widget-heading">
                                <h3 class="widget-title">INFORMACIÓN REGISTRADA EN PEOE</h3>
                                <input type="hidden" id="id_subsistema" value="{{$uni->university_id}}">
                                
                            </div>
                            <ul class="user-info">
                                <li>
                                    <label>NOMBRE:</label>
                                    <p class="nombre text-justify"></p>
                                </li>
                                <li>
                                    <label>RESEÑA:</label>
                                    <p id="resena" class="text-justify"></p>
                                </li>
                                <li>
                                    <label>MISIÓN:</label>
                                    <p id="mision" class="text-justify"></p>
                                </li>
                                <li>
                                    <label>VISIÓN:</label>
                                    <p id="vision" class="text-justify"></p>
                                </li>
                                <li>
                                    <label>CORREO:</label>
                                    <p id="correo" class="text-justify"></p>
                                </li>
                                <li>
                                    <label>TELÉFONO:</label>
                                    <p id="tel" class="text-justify"></p>
                                </li>
                            </ul>
                        </div>
                        <div class="block-box user-about">
                            <div class="widget-heading">
                                <h3 class="widget-title">MUNICIPIO Y MODALIDADES DISPONIBLES</h3>
                            </div>
                            <ul id="unidades" class="user-info">
                                <li style="color:black;font-weight:bolder;">
                                    <label>UNIDAD</label>
                                    <p>MODALIDAD</p>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 widget-block widget-break-lg">
                        <div class="widget widget-user-about">
                            <div class="widget-heading">
                                <h3 class="widget-title">INFORMACIÓN DE CONTACTO</h3>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                            Actualizar Imagen de Perfil
                                        </button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal2">
                                            Actualizar Banner
                                        </button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal3">
                                            Actualizar Portada
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="user-info">
                                <p id="abreviatura"></p>
                                <ul class="info-list">
                                    <li id="sitio"><span>Sitio Web:</span></li>
                                    <li id="email"><span>E-mail:</span></li>
                                    <li id="whats"><span>WhatsApp:</span></li>
                                    <li id="tele"><span>Teléfono:</span></li>
                                    <li id="municipio"><span>Municipio:</span></li>
                                    <li id="cp"><span>C.P:</span></li>
                                    <li id="calle"><span>Calle:</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Modal 2-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ACTUALIAR IMAGEN DE PERFIL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="text-align:center;" class="modal-body">
                    <div style="width:115px;margin:auto;">
                    @if($uni->logo)
                        <img style="border-radius:50%" src="{{asset('img/'.$uni->logo)}}" class="img-thumbnail img-fluid m-3" alt="...">
                    @else
                        <img style="border-radius:50%;" src="{{asset('media/banner/user_1.jpg')}}" class="img-thumbnail m-3" alt="...">
                    @endif
                    </div>
                        <h5>Las dimensiones de la imagen deben ser de 115x115 y en formato png o jpg</h5>
                    <form method="post" action="/university/perfil/actualizarLogo" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                          <input type="file" name="logo" class="custom-file-input" id="customFileLang" lang="es">
                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        
            <!-- Modal 2-->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR BANNER</h5>
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="text-align:center;" class="modal-body">
                    @if($uni->banner)
                        <img src="{{asset('/img/'.$uni->banner)}}" class="img-fluid img-thumbnail my-3" alt="...">
                    @else
                        <img src="{{asset('media/banner/banner_user.jpg')}}" class="img-fluid img-thumbnail my-3" alt="...">
                    @endif
                        <h5>Las dimensiones del banner deben ser de 1170x337 y en formato png o jpg</h5>
                    <form method="post" action="/university/perfil/actualizarBanner" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                          <input type="file" name="banner" class="custom-file-input" id="customFileLang" lang="es">
                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
                    <!-- Modal 3 portada-->
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR PORTADA INSTITUCIONAL</h5>
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="text-align:center;" class="modal-body">
                    @if($uni->portada)
                        <img src="{{asset('/img/'.$uni->portada)}}" class="img-fluid" class="img-fluid img-thumbnail my-3" alt="...">
                    @else
                        <img src="{{asset('media/location/location_1.jpg')}}" class="img-fluid img-thumbnail my-3" alt="...">
                    @endif
                        <h5>Las dimensiones del banner deben ser de 580x430 y en formato png o jpg</h5>
                    <form method="post" action="/university/perfil/actualizarPortada" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                          <input type="file" name="portada" class="custom-file-input" id="customFileLang" lang="es">
                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Jquery Js -->
    <script src="{{asset('dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dependencies/imagesloaded/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('dependencies/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('dependencies/isotope-layout/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('dependencies/slick-carousel/js/slick.min.js')}}"></script>
    <script src="{{asset('dependencies/sal.js/sal.js')}}"></script>
    <script src="{{asset('dependencies/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('dependencies/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('dependencies/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('dependencies/elevate-zoom/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('dependencies/bootstrap-validator/js/validator.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>

    <!-- Site Scripts -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function(){
            var id_subsistema=$("#id_subsistema").val();
            var id_municipio;
                $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_subsistema, function(data){
                        $(".nombre").text(data[0].Nombre);
                        $("#resena").text(data[0].Reseña);
                        $("#mision").text(data[0].Mision);
                        $("#vision").text(data[0].Vision);
                        $("#pagina").text(data[0].PaginaWeb);
                        $("#sitio").append(data[0].PaginaWeb);
                        $("#pagina").attr("href",data[0].PaginaWeb);
                        $("#correo").text(data[0].Correo);
                        $("#email").append(data[0].Correo);
                        $("#whats").append(data[0].Whatsapp);
                        $("#cp").append(data[0].CodigoPostal);
                        $("#calle").append(data[0].Calle);
                        $("#correo").attr("href","mailto:"+data[0].Correo);
                        $("#tel").text(data[0].NoTelefono);
                        $("#tele").append(data[0].NoTelefono);
                        $("#facebook").attr("href",(data[0].Facebook));
                        $("#twitter").attr("href",data[0].Twitter);
                        $("#youtube").attr("href",(data[0].VideoPromo));
                        $("#abreviatura").text(data[0].Abreviatura);
                        id_municipio=data[0].Municipio;
                        
                        $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdMunicipio/'+id_municipio, function(data){
                            $("#municipio").append(data[0].Nombre);
                        });
                    });
                
                $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllEscSubId/'+id_subsistema, function(data){
                        data.forEach(function(dato,index){
                            var cadena="<li><label id='municipio"+index+"'></label><p id='sistema"+index+"'></p></li>";
                            $("#unidades").append(cadena);
                            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdMunicipio/'+dato.Municipio, function(data){
                               $("#municipio"+index).text(data[0].Nombre);
                            });
                            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdModalidad/'+dato.Modalidad, function(data){
                                $("#sistema"+index).text(data[0].Nombre);
                            });
                        });
                    });
                    
                   
        });
    </script>
@endsection