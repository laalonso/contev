@extends('layouts.general')

@section('contenido')
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{asset('/img/banners/1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('/img/banners/img1.jpeg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('/img/banners/img2.jpeg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('/img/banners/img3.jpeg')}}" class="d-block w-100" alt="...">
                </div>
              </div>
             <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
            </div>
        <!--=====================================-->
        <!--=         Objetivo       	=-->
        <!--=====================================-->
        <section class="why-choose-us">
            <div class="container" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="why-choose-box">
                            <h2 class="item-title" id="diagrama-titulo" style="color: #6D132D;">¿Cómo funciona Conexión?</h2>
                            <p class="text-justify" id="diagrama-descripcion">Será un espacio común en donde se atenderán las necesidades de los cinco sectores  para que puedan coincidir e iniciar compromisos laborales, económicos o de investigación en la búsqueda de bien común </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="diagrama-conexion">
                            <div class="diagrama-esfera" id="diagrama-comunidad"></div>
                            <div class="diagrama-esfera" id="diagrama-empresa"></div>
                            <div class="diagrama-esfera" id="diagrama-sociedad"></div>
                            <div class="diagrama-esfera" id="diagrama-gobierno"></div>
                            <div class="diagrama-esfera" id="diagrama-ambiente"></div>
                            <div class="diagrama-esfera" id="diagrama-con"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=         16 subsistemas       	=-->
        <!--=====================================-->
        <section class="community-network">
            <ul class="map-marker">
                <li><img src="media/banner/marker_1.png" alt="marker"></li>
                <li><img src="media/banner/marker_2.png" alt="marker"></li>
                <li><img src="media/banner/marker_3.png" alt="marker"></li>
                <li><img src="media/banner/marker_4.png" alt="marker"></li>
                <li><img src="media/banner/marker_5.png" alt="marker"></li>
            </ul>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="community-content">
                            <h2 class="item-title"><span>16 Subsistemas y más de 4,000 escuelas a lo largo de Veracruz </span></h2>
                            <p>
                                <ul>
                                    <li><strong>Educación Media Superior:</strong> <br>
                                    BELVER, CECyTEV, CEPA, COBAEV, CONALEP, DGB, TEBACOM, TEBAEV, UPAV*
                                    </li>
                                    <li><strong>Educación Superior:</strong> <br>
                                        DEN, DET, DGEU, ICC, UPAV*, UPN, UPV
                                    </li> 
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-shape" data-sal="slide-left" data-sal-duration="500" data-sal-delay="500">
                <img src="media/figure/shape_7.png" alt="bg">
            </div>
        </section>
        <!--=====================================-->
        <!--=         Empresas Conectadas       	=-->
        <!--=====================================-->

        <!--=====================================-->
        <!--=         Escuelas conectadas       =-->
        <!--=====================================-->
        <section class="section location-find">
            <div class="container">
                <div class="section-heading">
                    <h2 class="heading-title">Escuelas Conectadas</h2>
                    <p>Estas son las escuelas conectadas con mayor interacción. </p>
                </div>
                <div class="row gutters-20">
                    <div class="col-lg-6">
                        <div class="location-box">
                            <div class="item-img">
                                @if(file_exists("img/".$portadas[0]->portada))
                                    <a target="_blank" href="https://semsys.sev.gob.mx/peoe/PESUB.html?sub={{$portadas[0]->university_id}}">
                                        <img class="img-fluid" src="/img/portadas/JH5UO9vK6pOeaDjQAU3zbblt49Z3fZ04FcQsWX86.png">
                                    </a>
                                @else
                                    <a target="_blank" href="https://semsys.sev.gob.mx/PEOE/PE.html">
                                        <img class="img-fluid" src="/media/location/location_1.jpg">
                                    </a>
                                @endif
                            </div>
                            <div class="item-content">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row gutters-20">
                            <div class="col-sm-6">
                                <div class="location-box">
                                    <div class="item-img">
                                        @if(!file_exists("img/".$portadas[1]->portada))
                                            <a target="_blank" href="https://semsys.sev.gob.mx/PEOE/PE.html">
                                                <img class="img-fluid" src="/media/location/location_1.jpg">
                                            </a>
                                        @else
                                            <a target="_blank" href="https://semsys.sev.gob.mx/peoe/PESUB.html?sub={{$portadas[1]->university_id}}">
                                                <img class="img-fluid" src="{{'/img/'.$portadas[1]->portada}}" >
                                            </a>
                                        @endif
                                    </div>
                                    <div class="item-content">
                                    </div>
                                </div>
                                <div class="location-box">
                                    <div class="item-img">
                                        @if(!file_exists("img/".$portadas[2]->portada))
                                            <a target="_blank" href="https://semsys.sev.gob.mx/PEOE/PE.html">
                                                <img class="img-fluid" src="/media/location/location_1.jpg">
                                            </a>
                                        @else
                                        <a target="_blank" href="https://semsys.sev.gob.mx/peoe/PESUB.html?sub={{$portadas[2]->university_id}}">
                                            <img class="img-fluid" src="{{'/img/'.$portadas[2]->portada}}" >
                                        </a>
                                        @endif
                                    </div>
                                    <div class="item-content">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="location-box">
                                    <div class="item-img">
                                        @if(!file_exists("img/".$portadas[3]->portada))
                                            <a target="_blank" href="https://semsys.sev.gob.mx/PEOE/PE.html">
                                                <img class="img-fluid" src="/media/location/location_1.jpg">
                                            </a>
                                        @else
                                        <a target="_blank" href="https://semsys.sev.gob.mx/peoe/PESUB.html?sub={{$portadas[3]->university_id}}">
                                            <img class="img-fluid" src="{{'/img/'.$portadas[3]->portada}}" >
                                        </a>
                                        @endif
                                    </div>
                                    <div class="item-content">
                                    </div>
                                </div>
                                <div class="location-box">
                                    <div class="item-img">
                                        @if(!file_exists("img/".$portadas[4]->portada))
                                            <a target="_blank" href="https://semsys.sev.gob.mx/PEOE/PE.html">
                                                <img class="img-fluid" src="/media/location/location_1.jpg">
                                            </a>
                                        @else
                                        <a target="_blank" href="https://semsys.sev.gob.mx/peoe/PESUB.html?sub={{$portadas[4]->university_id}}">
                                            <img class="img-fluid" src="{{'/img/'.$portadas[4]->portada}}" >
                                        </a>
                                        @endif
                                    </div>
                                    <div class="item-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="see-all-btn">
                    <a href="/universidades" class="button-slide">
                        <span class="btn-text">Ver todas las escuelas</span>
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=         Proyectos       	=-->
        <!--=====================================-->
        <section class="section groups-popular">
            <div class="container">
                <div class="section-heading">
                    <h2 class="heading-title">PROYECTOS RECONOCIOS DE LA COMUNIDAD EDUCACTIVA</h2>
                    <p>Conoce los trabajos que alumnos y maestros han desarrollado, clasificados por categorías según el tipo de impacto positivo que han generado:
                        <ul>
                            <li>Ambiental</li> 
                            <li>Tecnológico</li>     
                            <li>Administrativo</li> 
                            <li>Social asociativo</li>  
                        </ul>
                        </p>
                </div>
                <div class="row gutters-15 justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro1.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 1</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro2.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 2</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro3.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 3</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro4.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 4</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro5.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 5</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro6.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 6</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro7.png')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 7</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="groups-box">
                            <div class="item-img">
                                <img style="height:200px" class="img-fluid" src="{{asset('/img/pro8.jpg')}}" alt="Groups">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="user-single-group.html">Proyecto 8</a></h3>
                                <div class="groups-member">11,250 Interacciones</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="see-all-btn">
                    <a href="user-groups.html" class="button-slide">
                        <span class="btn-text">Ver todos los proyectos</span>
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="10px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M16.671,9.998 L12.997,9.998 L16.462,6.000 L5.000,6.000 L5.000,4.000 L16.462,4.000 L12.997,0.002 L16.671,0.002 L21.003,5.000 L16.671,9.998 ZM17.000,5.379 L17.328,5.000 L17.000,4.621 L17.000,5.379 ZM-0.000,4.000 L3.000,4.000 L3.000,6.000 L-0.000,6.000 L-0.000,4.000 Z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $("#diagrama-comunidad").click(function(){
            $("#diagrama-titulo").text("COMUNIDAD EDUCATIVA");
            $("#diagrama-descripcion").html("<p>Aquí podrás encontrar la oferta educativa disponible en todo el Estado, así como el catálogo de los servicios ofrecidos por todos los bachilleratos, universidades e instituciones tecnológicas de nivel superior; organizados por ubicación geográfica y tipo de servicio, se enlistarán cursos y capacitaciones así como productos creados por la comunidad educativa.</p> <p> Se presentarán los proyectos de emprendimiento social y asociativo en los cuales estudiantes y docentes trabajan, clasificados por temáticas: ambientales, tecnológicas y sociales. </p> <p>Los planteles describirán la infraestructura de sus instalaciones como laboratorios y equipo especializado disponibles para los demás sectores.</p>");
        });
        
        $("#diagrama-empresa").click(function(){
            $("#diagrama-titulo").text("EMPRESAS");
            $("#diagrama-descripcion").html("<p>En este apartado estarán clasificadas por su actividad económica de acuerdo con el Sistema de Clasificación Industrial de América del Norte 2018 (SCIAN 2018), de esta forma accederán de manera rápida a temáticas de su giro e interés. </p><p>Será un espacio para dar a conocer los servicios que pueden brindar a la comunidad educativa. Se ofrecerán vacantes de empleo, servicio social, prácticas profesionales y colocación de alumnos para modelo de educación dual. </p><p>Los empresarios tendrán la oportunidad de asesorar, apoyar e invertir en los proyectos productivos, líneas de investigación y actividades académicas específicas, teniendo la oportunidad de convertirse en Aliados por la educación.</p>")
        });
        
        $("#diagrama-gobierno").click(function(){
            $("#diagrama-titulo").text("GOBIERNO");
            $("#diagrama-descripcion").html("<p>Dentro de esta sección las entidades publicarán convocatorias de becas y ayudas; de cursos y congresos; de empleo; de servicios especiales, y hasta de premios a las cuales podrán concursar todos los usuarios de la plataforma Conexión. </p> <p>Los organismos públicos, fungirán como figuras de autoridad y actuarán como entes reguladores cuando lo amerite alguna actividad dentro de la plataforma. </p>")
        });
        
        $("#diagrama-sociedad").click(function(){
            $("#diagrama-titulo").text("SOCIEDAD ORGANIZADA");
            $("#diagrama-descripcion").html("<p>En este módulo se compartirán las actividades y los servicios para promover la participación e integración ciudadana de todos los actores involucrados. De manera periódica se compartirán convocatorias para realizar campañas de bien común.</p>");
        });
        
        $("#diagrama-ambiente").click(function(){
            $("#diagrama-titulo").text("MEDIO AMBIENTE");
            $("#diagrama-descripcion").html("<p>Al interior de este apartado se enlistarán servicios de asesoría en estudios ambientales en temas como eficiencia energética, sistemas de tratamiento de agua pluvial, de captación, etc.</p><p>También se podrán ubicar diversas dependencias de servicios de reciclaje.</p>");
        });
        
        $("#diagrama-con").click(function(){
            $("#diagrama-titulo").text("¿Cómo funciona Conexión?");
            $("#diagrama-descripcion").html("Será un espacio común en donde se atenderán las necesidades de los cinco sectores para que puedan coincidir e iniciar compromisos laborales, económicos o de investigación en la búsqueda de bien común");
        });
        
    });
</script>
@endsection