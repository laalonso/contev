@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
          </ol>
        </nav>
            <div class="card">
                <div class="card-header">  {{ __('DATOS INSTITUCIONALES SOLO PUEDEN SER EDITADOS SOLO POR EL ADMINISTRADOR DE LA UNIVERSIDAD') }}</div>
                <div class="card-body">
                    <div id="img-estudiante">
                        <img class="img-fluid" style="border-radius: 50%" src="{{asset('img/'.Auth::User()->image)}}">
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>UNIDAD ACADÉMICA:</strong> <span id="uni-estudiante" class="d-none">{{Auth::User()->student()->first()->university_id}}</span>
                         </li>
                         <li class="list-group-item">
                            <strong>MODALIDAD:</strong> <span id="modalidad-estudiante" class="d-none"></span>
                         </li>
                         <li class="list-group-item">
                            <strong>CARRERA:</strong> <span id="carrera-estudiante" class="d-none">{{Auth::User()->student()->first()->program_id}}</span>
                         </li>
                         <li class="list-group-item">
                            <strong>MATRÍCULA:</strong> {{Auth::User()->student()->first()->enrollment}}
                         </li>
                        <li class="list-group-item">
                            <strong>NOMBRE:</strong> {{Auth::User()->name}} {{Auth::User()->f_surname}} {{Auth::User()->s_surname}}
                        </li>
                        <li class="list-group-item">
                            <strong>TELEFONO:</strong> {{Auth::User()->phone}}
                        </li>
                        <li class="list-group-item">
                            <strong>CORREO INSTITUCIONAL:</strong> {{Auth::User()->email}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  {{ __('DATOS PERSONALES') }}</div>
 @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        
                        <li class="list-group-item">
                            <strong>EMAIL PERSONAL:</strong> {{Auth::User()->student->personal_email}}
                         </li>
                         <li class="list-group-item">
                            <strong>TEL. PERSONAL:</strong> {{Auth::User()->student->personal_tel}}
                         </li>
                          <li class="list-group-item">
                            <strong>HABILIDADES PERSONALES:</strong> <label id="habilidades">{{Auth::User()->student->habilidades}}</label>
                         </li>
                         <li class="list-group-item">
                            <strong>CURRICULUM:</strong> <a class="btn btn-primary" target="_blank" href="http://conexion-tecnologicav2.projects-itsz.com/img/{{Auth::User()->student->cv}}" role="button">Ver</a>
                            
                         </li>
                    </ul>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ACTUALIZAR INFORMACIÓN
</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form method="post" action="estudiantes/cv/actualizar" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                    <label for="correo">Email</label>
                    <input type="email" class="form-control" value="{{Auth::User()->student->personal_email}}" id="correo" name="correo">
                  </div>
                  <div class="form-group">
                    <label for="correo">Telefono</label>
                    <input type="tel" class="form-control" value="{{Auth::User()->student->personal_tel}}" id="tel" name="tel">
                  </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">CV en formato PDF</label>
                        <input type="file" name="cv" class="form-control-file" id="cv">
                    </div>
            <div class="container-fluid">
            	<h4>Selecciona las 5 habilidades con las que mejor te indentificas</h4>
            	<h5>Seleccionadas: <label id="habilidades-seleccionadas"></label></h5>
                <div class="row">
                    <div class="col">
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Pensamiento analítico" class="form-check-input" name="h1" id="h1">
                            <label class="form-check-label" for="exampleCheck1">Pensamiento analítico</label>
                        </div>
                        
                         <div class="form-group form-check">
                            <input type="checkbox" value="Precisión" class="form-check-input" name="h3" id="h3">
                            <label class="form-check-label" for="exampleCheck1">Precisión</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Camaradería" class="form-check-input" name="h5" id="h5">
                            <label class="form-check-label" for="exampleCheck1"> Camaradería</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Conectividad" class="form-check-input" name="h7" id="h7">
                            <label class="form-check-label" for="exampleCheck1"> Conectividad</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Resolución de problemas" class="form-check-input" name="h9" id="h9">
                            <label class="form-check-label" for="exampleCheck1"> Resolución de problemas</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Cooperación" class="form-check-input" name="h11" id="h11">
                            <label class="form-check-label" for="exampleCheck1">Cooperación</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Creatividad" class="form-check-input" name="h13" id="h13">
                            <label class="form-check-label" for="exampleCheck1">Creatividad</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Curiosidad" class="form-check-input" name="h15" id="h15">
                            <label class="form-check-label" for="exampleCheck1">Curiosidad</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Comprensión" class="form-check-input" name="h17" id="h17">
                            <label class="form-check-label" for="exampleCheck1">Comprensión</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Resiliencia" class="form-check-input" name="h19" id="h19">
                            <label class="form-check-label" for="exampleCheck1">Resiliencia</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Análisis" class="form-check-input" name="h21" id="h21">
                            <label class="form-check-label" for="exampleCheck1">Análisis</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Uso de la tecnología" class="form-check-input" name="h23" id="h23">
                            <label class="form-check-label" for="exampleCheck1">Uso de la tecnología</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Presencia" class="form-check-input" name="h37" id="h37">
                            <label class="form-check-label" for="exampleCheck1"> Presencia </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Productividad" class="form-check-input" name="h38" id="h38">
                            <label class="form-check-label" for="exampleCheck1"> Productividad </label>
                        </div>
                        
                       
                        
                    </div>
                    <div class="col">
                        <div class="form-group form-check">
                            <input type="checkbox" value="Innovación" class="form-check-input" name="h2" id="h2">
                            <label class="form-check-label" for="exampleCheck1"> Innovación </label>
                        </div>
                        
                         <div class="form-group form-check">
                            <input type="checkbox" value="Colaboración" class="form-check-input" name="h4" id="h4">
                            <label class="form-check-label" for="exampleCheck1"> Colaboración </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Confianza" class="form-check-input" name="h6" id="h6">
                            <label class="form-check-label" for="exampleCheck1"> Confianza </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Contribución" class="form-check-input" name="h8" id="h8">
                            <label class="form-check-label" for="exampleCheck1"> Contribución </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Aprendizaje activo" class="form-check-input" name="h10" id="h10">
                            <label class="form-check-label" for="exampleCheck1"> Aprendizaje activo </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Coraje" class="form-check-input" name="h12" id="h12">
                            <label class="form-check-label" for="exampleCheck1"> Coraje </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Tolerancia al estrés" class="form-check-input" name="h14" id="h14">
                            <label class="form-check-label" for="exampleCheck1"> Tolerancia al estrés </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Determinación" class="form-check-input" name="h16" id="h16">
                            <label class="form-check-label" for="exampleCheck1"> Determinación </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Entusiasmo" class="form-check-input" name="h18" id="h18">
                            <label class="form-check-label" for="exampleCheck1"> Entusiasmo </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Flexibilidad" class="form-check-input" name="h20" id="h20">
                            <label class="form-check-label" for="exampleCheck1"> Flexibilidad </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Enfoque" class="form-check-input" name="h22" id="h22">
                            <label class="form-check-label" for="exampleCheck1"> Enfoque </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Liderazgo e influencia social" class="form-check-input" name="h24" id="h24">
                            <label class="form-check-label" for="exampleCheck1"> Liderazgo e influencia social </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Seguridad" class="form-check-input" name="h40" id="h40">
                            <label class="form-check-label" for="exampleCheck1"> Seguridad </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Autoestima" class="form-check-input" name="h41" id="h41">
                            <label class="form-check-label" for="exampleCheck1"> Autoestima </label>
                        </div>
                        
                        
                        
                    </div>
                    
                    <div class="col">
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Independencia" class="form-check-input" name="h25" id="h25">
                            <label class="form-check-label" for="exampleCheck1"> Independencia </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Innovación" class="form-check-input" name="h26" id="h26">
                            <label class="form-check-label" for="exampleCheck1"> Innovación </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Creatividad" class="form-check-input" name="h27" id="h27">
                            <label class="form-check-label" for="exampleCheck1"> Creatividad </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Integridad" class="form-check-input" name="h28" id="h28">
                            <label class="form-check-label" for="exampleCheck1"> Integridad </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Intuición" class="form-check-input" name="h29" id="h29">
                            <label class="form-check-label" for="exampleCheck1"> Intuición </label>
                        </div>
                        
                         <div class="form-group form-check">
                            <input type="checkbox" value="Alegría" class="form-check-input" name="h30" id="h30">
                            <label class="form-check-label" for="exampleCheck1"> Alegría </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Amabilidad" class="form-check-input" name="h31" id="h31">
                            <label class="form-check-label" for="exampleCheck1"> Amabilidad </label>
                        </div>
                        
                         <div class="form-group form-check">
                            <input type="checkbox" value="Aprendizaje" class="form-check-input" name="h32" id="h32">
                            <label class="form-check-label" for="exampleCheck1"> Aprendizaje </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Iniciativa" class="form-check-input" name="h33" id="h33">
                            <label class="form-check-label" for="exampleCheck1"> Iniciativa </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Escuchar" class="form-check-input" name="h34" id="h34">
                            <label class="form-check-label" for="exampleCheck1"> Escuchar </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Lealtad" class="form-check-input" name="h35" id="h35">
                            <label class="form-check-label" for="exampleCheck1"> Lealtad </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Paciencia" class="form-check-input" name="h36" id="h36">
                            <label class="form-check-label" for="exampleCheck1"> Paciencia </label>
                        </div>
                        
                         <div class="form-group form-check">
                            <input type="checkbox" value="Respeto" class="form-check-input" name="h39" id="h39">
                            <label class="form-check-label" for="exampleCheck1"> Respeto </label>
                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" value="Servicio" class="form-check-input" name="h42" id="h42">
                            <label class="form-check-label" for="exampleCheck1"> Servicio </label>
                        </div>
                        
                    </div>
                </div>
            </div>
                    
          <input class="btn btn-primary" type="submit" value="Actualiar">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        
        var habilidades=$("#habilidades").text();
        
        var arrayH=habilidades.split(", ");
        
             for(i=0;i<arrayH.length;i++){
                 	$('.form-check-input').each(function(){
             			if($(this).val()==arrayH[i]){
             				$(this).attr("checked","checked");
             			}
             		});
             }
             
             
             	var seleccionados=$('input:checked').length
         	$("#habilidades-seleccionadas").text(seleccionados);
         	if(seleccionados==5){
         		$('input[type="checkbox"]').each(function(){
         			if(!$(this).is(':checked')){
         				$(this).attr("disabled","disabled");
         			}
         		});
         	}else{
         		$('input[type="checkbox"]').each(function(){
         			if(!$(this).is(':checked')){
         				$(this).removeAttr("disabled");
         			}
         		});
         	}
             
        
        var id_universidad=$("#uni-estudiante").text();
        
         $('input[type="checkbox"]').change(function(){
         	var seleccionados=$('input:checked').length
         	$("#habilidades-seleccionadas").text(seleccionados);
         	if(seleccionados==5){
         		$('input[type="checkbox"]').each(function(){
         			if(!$(this).is(':checked')){
         				$(this).attr("disabled","disabled");
         			}
         		});
         	}else{
         		$('input[type="checkbox"]').each(function(){
         			if(!$(this).is(':checked')){
         				$(this).removeAttr("disabled");
         			}
         		});
         	}
            
         });

        $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdEscuelas/'+id_universidad, function(data){
                $("#uni-estudiante").html(data[0].Nombre);
                $("#modalidad-estudiante").text(data[0].Modalidad);
                $("#uni-estudiante").removeClass("d-none");
                $("#uni-estudiante").addClass("d-line");
                var id_modalidad=data[0].Modalidad;

                $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdModalidad/'+id_modalidad, function(data){
                    $("#modalidad-estudiante").text(data[0].Nombre);
                    $("#modalidad-estudiante").removeClass("d-none");
                    $("#modalidad-estudiante").addClass("d-line");
                });
            });
        var carrera_id=$("#carrera-estudiante").text();
        $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdOferta/'+carrera_id, function(data){
                    $("#carrera-estudiante").text(data[0].Nombre_Carrera);
                    $("#carrera-estudiante").removeClass("d-none");
                    $("#carrera-estudiante").addClass("d-line");
                });


        $(".show-modal").on('click',function () {
            var ido = $(this).attr('id');
            $("#content_archivo").html('<embed src="/img/'+ido+'") }}" type="application/pdf" width="100%" height="500px" />');
            $('#showm').modal('show');
        });

    });
</script>
@endsection
