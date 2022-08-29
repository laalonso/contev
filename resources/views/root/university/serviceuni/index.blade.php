@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Servicios</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('SERVICIOS DE LAS UNIVERSIDADES') }}</div>
            
                <div class="card-body">
                <a href="{{ url('/university/services/create') }}" class="btn btn-success" role="botton">Añadir</a><br><br>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
             <div class="alert alert-primary" role="alert">
                                      <label for="tipo">Selecione el tipo de oferta que desee añadir</label>
                                        <select id="tipo" name="tipo" class="custom-select" onChange="mostrar(this.value);">
                                        <!--  <option selected>Tipo de servicio</option>-->
                                          <option value="" selected>Elija una opción</option>
                                          @if(session('servicio')=="Capacitacion")
                                            <option selected value="Capacitacion">Capacitación</option>
                                          @else
                                            <option value="Capacitacion">Capacitación</option>
                                          @endif
                                          @if(session('servicio')=="Certificacion")                                          
                                            <option selected value="Certificacion">Certificación</option>
                                          @else
                                            <option value="Certificacion">Certificación</option>
                                          @endif
                                          @if(session('servicio')=="Laboratorio")
                                            <option selected value="Laboratorio">Laboratorio</option>
                                          @else
                                            <option value="Laboratorio">Laboratorio</option>
                                          @endif
                                          @if(session('servicio')=="Otro")
                                            <option selected value="Otro">otro</option>
                                          @else
                                            <option value="Otro">otro</option>
                                          @endif
                                        </select>                
                                  </div>        
                    
<div id="capacitacion" style="display: none;"> 
    <div class="card">
        <div class="card-header">
             CAPACITACIONES<span id="uni" class="d-none">
             </span>
        </div>
        <div class="card-body table-responsive">
                <div class="table-responsive">
                    <table id="tb-capacitacion" class="table table-striped">
                        <thead>
                            <tr>
                               
                                  <th scope="col">Tipo</th>
                                <th scope="col">Duración</th>
                                <th scope="col">horas</th>
                                 <th scope="col">Modalidad</th>
                                <th scope="col">Dirigido</th>
                                <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            @if($info->type=="Capacitacion")
                            <tr>
                               
                                   <td>{{ $info->type_training}}</td> 
                                    <td>{{ $info->duration}}</td>
                                   <td>{{ $info->hour}}</td>
                                   <td>{{ $info->modality}}</td>
                                   <td>{{ $info->managed}}</td>
                                   <td>{{ $info->price}}</td>
                                    <td>
                                  
                                </td>
                                <td>
                                    <form action="{{ url('/university/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                               
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>   

<div id="certificacion" style="display: none;">
    <div class="card">
        <div class="card-header">
             CERTIFICACIÓN<span id="uni" class="d-none">
             </span>
        </div>
        <div class="card-body table-responsive">
                <div class="table-responsive">
                    <table id="tb-certificacion" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Examen</th>
                                <th scope="col">Duración</th>
                                 <th scope="col">Lugar</th>
                                <th scope="col">Area de estudio</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Detalles</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            @if($info->oferta=="Certificacion")
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                <td>{{ $info->exam}}</td>
                                <td>{{ $info->duration_exam}}</td>
                                <td>{{ $info->place}}</td>
                                <td>{{ $info->study_area}}</td>
                                <td>${{ number_format($info->price_certification,2)}}</td>
                                <td>{{ $info->details_certification}}</td>
                                <td>
                                    <form action="{{ url('/university/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>                               
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
</div>   
                    
                    
<div id="laboratorio" style="display: none;font-size:0.8em">
    <div class="card">
        <div class="card-header">
             LABORATORIOS<span id="uni" class="d-none">
             </span>
        </div>
        <div class="card-body table-responsive">
                <div class="table-responsive">
                    <table id="tb-laboratorios" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Área</th>
                                <th scope="col">Nombre del Laboratorio</th>
                                <th scope="col">Imagenes</th>
                                <th scope="col">Detalles</th>
                                <th scope="col"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            @if($info->oferta=="Laboratorio")                           
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                <td>{{ $info->type}}</td>
                                <td class="nombre-servicio">{{ $info->name}}</td>
                                <td class="text-center">                                
                                    <a class="btn btn-primary" href="/university/services/equipment/galeria/{{encrypt($info->id)}}" role="button">
                                      Ver <span class="badge badge-light"></span>
                                    </a>                                      
                                </td>
                                <td>
                                    <a class="btn btn-success opciones" href="/university/services/laboratorio/detalles/{{encrypt($info->id)}}">Detalles</a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Agregar
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item opciones" id="{{encrypt($info->id)}}" type="button" data-toggle="modal" data-target="#exampleModal">Equipo</button>
                                        <button class="dropdown-item opciones" id="{{encrypt($info->id)}}" type="button" data-toggle="modal" data-target="#exampleModal2">Personal</button>
                                      </div>
                                    </div>                                   
                                </td>
                               <td>
                                <button class="btn btn-danger eliminar-equipo" id="{{encrypt($info->id)}}" type="button" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                               </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div><!-- Fin table responsive -->
                </div><!-- fin cardbody -->
    </div><!-- Fin del card -->
                    </div>
<div id="otro" style="display: none;">
    <div class="card">
        <div class="card-header">
             OTROS<span id="uni" class="d-none">
             </span>
        </div>
        <div class="card-body table-responsive">
                <div class="table-responsive">
                      <table id="tb-otros" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Tipo</th>
                                <th scope="col">Detalles</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            @if($info->type=="Otro")
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                   <td>{{ $info->type_other}}</td> 
                                 <td>{{ $info->other}}</td>
                                   
                                  
                                    <td>
                                  
                                </td>
                                <td>
                                <td>
                                    <form action="{{ url('/university/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                               
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>               
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal Eliminar -->
<div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="label-eliminar">ELIMINAR INFORMACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="msj-eliminar" class="modal-body">
            ¿Está usted seguro que desea eliminar está información?
      </div>
      <div class="modal-footer">
        <form id="form-eliminar" method="post" action="">
            @csrf
            @method('DELETE')
            <input type="hidden" id="eliminar_id" name="eliminar_id" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-danger">ELIMINAR</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Modal2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PERSONAL ESPECIALIZADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/university/services/personal">
            @csrf
            <input type="hidden" id="university_id" value="{{@Auth::user()->university->university_id}}">
            <input class="servicio_id" name="service_id" type="hidden" value="">
            <div class="form-group">
                <label for="nombre">NOMBRE DEL PERSONAL</label>
                <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="grado">GRADO ACADÉMICO</label>
                <select class="form-control" id="grado" name="grado">
                    <option value="0">Selecciona el Grado Máximo Académico</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Maestría">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                    <option value="Post doctorado">Post doctorado</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="programa">Modalidad</label>
                <select name="modalidad" id="modalidad" class="form-control" required autofocus>
                <option value=0>Seleccione una modalidad</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="programa">Unidad académica</label>
                <select name="unidad" id="unidad" class="form-control" required autofocus>
                <option></option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="programa">Programa</label>
                <select name="programa" id="programa" class="form-control" required autofocus>
                <option></option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="linea">LÍNEA DE INVESTIGACIÓN</label>
                <select name="linea" id="linea" class="form-control" required autofocus>
                    <option value="0">Seleccionar línea de investigación</option>
                    @foreach($lineas as $linea)
                        <option value="{{$linea->id}}">{{$linea->linea}}</option>
                    @endforeach
                </select>            
            </div>
            
            <div class="form-group">
                    <label for="certificaciones">CERTIFICACIONES</label>
                    <textarea class="form-control" id="certificaciones" name="certificaciones" rows="3"></textarea>
                </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE EQUIPAMIENTO DE LABORATORIO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/university/services/equipment">
                @csrf
                <input class="servicio_id" name="service_id" type="hidden" value="">
                <div class="form-group">
                    <label for="inventario">No. de Inventario</label>
                    <input type="text" class="form-control" id="inventario" name="inventario" aria-describedby="emailHelp">
                </div>
                
                <div class="form-group">
                    <label for="nombre">NOMBRE DEL EQUIPO</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                </div>
                
                <div class="form-group">
                    <label for="marca">MARCA DEL EQUIPO</label>
                    <input type="text" class="form-control" id="marca" name="marca" aria-describedby="emailHelp">
                </div>
                
                <div class="form-group">
                    <label for="modelo">MODELO DEL EQUIPO</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" aria-describedby="emailHelp">
                </div>
              
                <div class="form-group">
                    <label for="descripcion">DESCRIPCIÓN DEL EQUIPO</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>   
                                
                <div class="form-group">
                    <label for="capacidad">CAPACIDAD DE TRABAJO (EN PRODUCCIÓN)</label>
                    <textarea class="form-control" id="capacidad" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="funcionalidad">FUNCIONALIDAD DEL EQUIPO</label>
                    <textarea class="form-control" id="funcionalidad" name="funcionalidad" rows="3" placeholder="¿Qué se puede hacer con el equipo?"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="trabajos">TIPOS Y CARACTERÍSTICAS DE TRABAJO A DESARROLLAR</label>
                    <textarea class="form-control" id="trabajos" name="trabajos" rows="3" placeholder="Productos/Pruebas/Análisis/Estudios"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="lineas">LINEAS DE INVESTIGACIÓN</label>
                    <textarea class="form-control" id="lineas" name="lineas" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="servicios">SERVICIOS QUE SE PUEDEN OFERTAR</label>
                    <textarea class="form-control" id="servicios" name="servicios" rows="3"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#td-servicios').DataTable({
             "order": [],
             language: {
                url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
            }
        });
        
        var servicio=$("#tipo").val();
        if (servicio == "Capacitacion") {
        $("#capacitacion").show();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").hide();
          $("#otro").hide();
    }   

      if (servicio == "Certificacion") {
            $("#capacitacion").hide();
            $("#maquinaria").hide();
            $("#certificacion").show();
            $("#laboratorio").hide();
              $("#otro").hide();
      }
      if (servicio == "Laboratorio") {
            $("#capacitacion").hide();
            $("#maquinaria").hide();
            $("#certificacion").hide();
            $("#laboratorio").show();
              $("#otro").hide();
      }
    
      if (servicio == "Otro") {
            $("#capacitacion").hide();
            $("#maquinaria").hide();
            $("#certificacion").hide();
            $("#laboratorio").hide();
              $("#otro").show();
          
      }
        
        $(".eliminar-equipo").click(function(){
            var eliminar_id=$(this).attr("id");
            var nombreEquipo=$(this).parents("tr").find(".nombre-servicio").text();
            $("#form-eliminar").attr("action","/university/services/"+eliminar_id);
            $("#label-eliminar").text("ELIMINAR SERVICIO");
            $("#msj-eliminar").text("¿Está usted seguro que desea eliminar el siguiente servicio: "+nombreEquipo+"?");
            $("#eliminar_id").val(eliminar_id);
        });
    
        $(".opciones").click(function(){
            var servicio=$(this).attr("id");
            $(".servicio_id").val(servicio);
        });
        
        $(".detallesServicio").click(function(){
            var detalles=$(this).attr("detalles");
            $("#detalles_lab").text(detalles);
        });
        
        var id_universidad=$("#university_id").val();
        var clave_ct="";
        
        //-------------Modalidades académica-------------------------------------
        $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetAllModalida', function(data){
                 for(var i=0;i<data.length;i++){
                        $("#modalidad").append('<option value="'+data[i].Id_Modalidad+'">'+data[i].Nombre+'</option>');
                 }  
            });
//-------------Unidad académica-------------------------------------
          $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllEscSubId/'+id_universidad, function(data){
                 for(var i=0;i<data.length;i++){
                        $("#unidad").append('<option alt="'+data[i].Modalidad+'" value="'+data[i].Id_Escuela+'">'+data[i].Nombre+'</option>');
                 }  
            });

              $("#modalidad").change(function(){
                    var id_modalidad=$(this).val();
                    $("#unidad").children().each(function(){
                        if(id_modalidad!=$(this).attr("alt")){
                            $(this).addClass("d-none");
                        }else{
                            $(this).removeClass("d-none");
                        }
                    });
              });
//------------Programa--------------------------------------------
        $("#unidad").change(function(){
            var id_escuela=$(this).val();
            var modalidad=$("#modalidad").val();
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllOfertaEscIdSub/'+id_escuela, function(data){
                 for(var i=0;i<data.length;i++){
                    if(modalidad==data[i].Id_Modalidad){
                        $("#programa").append('<option value="'+data[i].Id_Oferta+'">'+data[i].Nombre_Carrera+'</option>');
                    }
                 }  
            });
        });

    });
</script>
<script type="text/javascript">
function mostrar(id) {
    if (id == "Capacitacion") {
        $("#capacitacion").show();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").hide();
          $("#otro").hide();
    }   

  if (id == "Certificacion") {
        $("#capacitacion").hide();
        $("#maquinaria").hide();
        $("#certificacion").show();
        $("#laboratorio").hide();
          $("#otro").hide();
  }
  if (id == "Laboratorio") {
        $("#capacitacion").hide();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").show();
          $("#otro").hide();
  }

  if (id == "Otro") {
        $("#capacitacion").hide();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").hide();
          $("#otro").show();
      
  }
}
</script>
<script>
	 $('#tb-laboratorios, #tb-maquinaria, #tb-capacitacion,#tb-certificacion, #tb-otros').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection
