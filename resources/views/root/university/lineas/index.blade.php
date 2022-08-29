@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Líneas de Investigación</li>
              </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('LÍNEAS DE INVESTIGACIÓN') }}</div>
                <div class="card-body">
                    <button type="button" id="modal1" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                      Agregar Línea de Investigación
                    </button>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="tb-lineas" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lineas as $linea)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td class="nombre-linea">{{$linea->linea}}</td>
                                        <td class="carrera" id="{{$linea->carrera_id}}"><div class="spinner"></div></td>
                                        <td>
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Opciones
                                              </button>
                                              <div class="dropdown-menu">
                                                <button type="button"class="dropdown-item editar" id="{{encrypt($linea->id)}}" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                                <button type="button"class="dropdown-item btn-danger eliminar" id="{{encrypt($linea->id)}}" data-toggle="modal" data-target="#modal-elimiar">Eliminar</button>
                                              </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

   
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR LÍNEA DE INVESTIGACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="linea-form" method="post" action="/university/lineas">
            @csrf
            <input type="hidden" id="metodo" name="_method" value="">
            <input type="hidden" id="university_id" value="{{@Auth::user()->university->university_id}}">
            <input class="servicio_id" name="service_id" type="hidden" value="">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="modalidad">Modalidad</label>
                <select name="modalidad" id="modalidad" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                    <option value=0>Seleccione una modalidad</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="unidad">Unidad académica</label>
                <select name="unidad" id="unidad" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                    <option></option>
                </select>                       
            </div>
            
            <div class="form-group">
                <label for="programa">Programa</label>             
                <select name="programa" id="programa" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                    <option></option>
                </select>                       
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modal-elimiar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="exampleModalLabel">ELIMINAR LÍNEA DE INVESTIGACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="msj-linea" class="modal-body">
            ¿Está usted seguro que desea eliminar la línea de investigación?
      </div>
      <div class="modal-footer">
        <form id="form-linea" method="post" action="">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-danger">ELIMINAR</button>
        </form>
      </div>
    </div>
  </div>
</div>


    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $(".eliminar").click(function(){
            var linea_id=$(this).attr("id");
            var nombre_linea=$(this).parents("tr").find(".nombre-linea").text();
            $("#form-linea").attr("action","/university/lineas/"+linea_id);
            $("#msj-linea").text("¿Está usted seguro que desea eliminar la siguiente línea de investigación: "+nombre_linea+"?");
        });
    
        $(".editar").click(function(){
            var linea_id=$(this).attr("id");
            $("#exampleModalLabel").text("EDITAR LÍNEA DE INVESTIGACIÓN");
            $("#linea-form").attr("action","/university/lineas/"+linea_id);
            $("#metodo").val("PUT");
            $.getJSON("/university/lineas/"+linea_id+"/edit", function(data){
                $("#nombre").val(data.linea);
                $("#modalidad").children().each(function(){
                    if($(this).val()==data.modalidad){
                        $(this).attr("selected","selected");
                        var id_modalidad=$(this).val();
                        $("#unidad").children().each(function(){
                            if(id_modalidad!=$(this).attr("alt")){
                                $(this).addClass("d-none");
                            }else{
                                $(this).removeClass("d-none");
                            }
                        });
                    }
                });
                $("#unidad").children().each(function(){
                    if($(this).val()==data.unidad){
                        $(this).attr("selected","selected");
                        var unidad=data.unidad;
                        var carrera=data.carrera_id;
                        var modalidad=$("#modalidad").val();       
                            $("#programa").html("");
                            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllOfertaEscIdSub/'+unidad, function(data){
                                 for(var i=0;i<data.length;i++){
                                    if(carrera==data[i].Id_Oferta){
                                        $("#programa").append('<option selected value="'+data[i].Id_Oferta+'">'+data[i].Nombre_Carrera+'</option>');
                                    }else{
                                        if(modalidad==data[i].Id_Modalidad){
                                            $("#programa").append('<option value="'+data[i].Id_Oferta+'">'+data[i].Nombre_Carrera+'</option>');
                                        }
                                    }
                                 } 
                            });
                    }
                });
                
            });
        });
        
        $("#modal1").click(function(){
            $("#exampleModalLabel").text("AGREGAR LÍNEA DE INVESTIGACIÓN");
            $("#linea-form").attr("action","/university/lineas");
            $("#metodo").val("POST");
        });
        
        $(".carrera").each(function(){
            var carrera_id=$(this).attr("id");
            var carrera=$(this);
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdOferta/'+carrera_id, function(data){
                 carrera.text(data[0].Nombre_Carrera);             
            });
        });
        
        $('#tb-lineas').DataTable({
             "order": [],
             language: {
                url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
            }
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
                $("#programa").html("");
                
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
@endsection
