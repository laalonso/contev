@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/university/services/">Servicios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Equipamiento</li>
                </ol>
            </nav>
            
            <div class="card">
                <div class="card-header">DETALLES</div>
            
                <div class="card-body">
                        <h3 class="text-center">{{$service->name}}</h3>
                        <p class="text-justify">{{$service->details_laboratory}}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">PERSONAL ESPECIALIZADO</div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                <th scope="col">#</th>
                                <th scope="col">ADSCRIPCIÓN</th>
                                <th scope="col">NOMBRE COMPLETO</th>
                                 <th scope="col">GRADO ACADÉMICO</th>
                                <th scope="col">LÍNEAS DE INVESTIGACIÓN</th>
                                <th scope="col">CERTIFICACIONES</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                        @php
                            $c=0;
                        @endphp
                        @foreach($datos as $personal)
                            @if($personal->laboratorio=="Personal")
                                @php
                                    $c++;
                                @endphp
                                <tr>                                   
                                   <td>{{$c}}</td> 
                                   <td>{{$personal->carrera}}</td>
                                   <td class="nombre-equipo">{{$personal->nombre}}</td>
                                   <td>{{$personal->grado}}</td>
                                   <td>{{$personal->lineas}}</td>
                                   <td>{{$personal->certificaciones}}</td>                                        
                                    <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            OPCIONES
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item opciones" personal="{{encrypt($personal->id)}}" id="editar-personal" type="button" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                            <button class="dropdown-item btn-danger eliminar-equipo" id="{{encrypt($personal->id)}}" type="button" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                                          </div>
                                        </div>
                                    </td>                               
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>    
 
                    </div>
                </div>
                
                
                
                
                <div class="card">
                <div class="card-header">EQUIPO ESPECIALIZADO</div>
            
                <div class="card-body">                    
                @php
                    $i=0;
                @endphp
                    <table class="table table-striped">
                        <thead>
                            <tr>                               
                                <th scope="col">#</th>
                                <th scope="col">INVENTARIO</th>
                                <th scope="col">NOMBRE</th>
                                 <th scope="col">MARCA</th>
                                <th scope="col">MODELO</th>
                                <th scope="col">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                        @foreach($datos as $equipo)
                        @if($equipo->laboratorio=="Equipo")
                            @php
                                $i++;
                            @endphp
                            <tr>
                               
                                   <td>{{$i}}</td> 
                                   <td>{{$equipo->inventario}}</td>
                                   <td class="nombre-equipo">{{$equipo->nombre}}</td>
                                   <td>{{$equipo->marca}}</td>
                                   <td>{{$equipo->modelo}}</td>
                                    <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            OPCIONES
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item add-imagen" id="{{encrypt($equipo->id)}}" type="button" data-toggle="modal" data-target="#modalImagen">Añadir Imagen</button>
                                            <a class="dropdown-item opciones" href="">Detalles del Equipo</a>
                                            <button class="dropdown-item opciones" equipo="{{encrypt($equipo->id)}}" id="editar-equipo" type="button" data-toggle="modal" data-target="#exampleModal2">Editar</button>
                                            <button class="dropdown-item btn-danger eliminar-equipo" id="{{encrypt($equipo->id)}}" type="button" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                                          </div>
                                        </div>
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
        
<!-- Modal Eliminar -->
<div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="label-eliminar">ELIMINAR EQUIPO ESPECIALIZADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="msj-eliminar" class="modal-body">
            ¿Está usted seguro que desea eliminar está información?
      </div>
      <div class="modal-footer">
        <form id="form-eliminar" method="post" action="/university/services/laboratorio/personal/eliminar">
            @csrf
            <input type="hidden" id="eliminar_id" name="eliminar_id" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-danger">ELIMINAR</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Añadir Imagen -->
<div class="modal fade" id="modalImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CARGAR IMAGEN DEL EQUIPO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="/university/services/equipment/cargarImagen" enctype="multipart/form-data">
                    @csrf                   
                    <input type="hidden" id="equipo_id" name="equipo_id" value="">
                    <input type="hidden" id="service_id" name="service_id" value="{{encrypt($service->id)}}">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="imagen" id="customFileLang" lang="es">
                      <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal Editar Personal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR PERSONAL ESPECIALIZADO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="/university/services/laboratorio/personal/actualizar">
                    @csrf
                    <input id="personal_id" name="personal_id" type="hidden" value="">
                    <div class="form-group">
                        <label for="carrera">CARRERA DE ADSCRIPCIÓN</label>
                        <input type="text" class="form-control" id="carrera" name="carrera" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre">NOMBRE DEL PERSONAL</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group">
                        <label for="grado">GRADO ACADÉMICO</label>
                        <input type="text" class="form-control" id="grado" name="grado" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group">
                        <label for="linea">LÍNEA DE INVESTIGACIÓN</label>
                        <input type="text" class="form-control" id="linea" name="linea" aria-describedby="emailHelp">
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
        
            <!-- Modal Editar Equipos -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR EQUIPAMIENTO DE LABORATORIO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/university/services/laboratorio/equipo/actualizar">
                @csrf
                <input id="service_id" name="service_id" type="hidden" value="">
                <div class="form-group">
                    <label for="inventario">No. de Inventario</label>
                    <input type="text" class="form-control" id="inventario" name="inventario" aria-describedby="emailHelp">
                </div>
                
                <div class="form-group">
                    <label for="nombre_equipo">NOMBRE DEL EQUIPO</label>
                    <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" aria-describedby="emailHelp">
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
                    <label for="caracteristicas">NORMATIVAS Y CARACTERÍSTICAS DEL EQUIPO</label>
                    <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="capacidad">CAPACIDAD DE TRABAJO</label>
                    <textarea class="form-control" id="capacidad" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="funcionalidad">FUNCIONALIDAD DEL EQUIPO</label>
                    <textarea class="form-control" id="funcionalidad" name="funcionalidad" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="trabajos">TIPOS Y CARACTERÍSTICAS DE TRABAJO A DESARROLLAR</label>
                    <textarea class="form-control" id="trabajos" name="trabajos" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="lineas">LINEAS DE INVESTIGACIÓN QUE SE CULTIVAN O SE PUEDEN CULTIVAR</label>
                    <textarea class="form-control" id="lineas_equipo" name="lineas" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="servicios">SERVICIOS QUE SE PUEDEN OFERTAR</label>
                    <textarea class="form-control" id="servicios" name="servicios" rows="3"></textarea>
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
        
        $(".add-imagen").click(function(){
          var equipo_id=$(this).attr("id");
          $("#equipo_id").val(equipo_id);
        });
        
        $(".eliminar-equipo").click(function(){
            var eliminar_id=$(this).attr("id");
            var nombreEquipo=$(this).parents("tr").find(".nombre-equipo").text();
            $("#label-eliminar").text("ELIMINAR EQUIPO/PERSONAL ESPECIALIZADO");
            $("#msj-eliminar").text("¿Está usted seguro que desea eliminar está información: "+nombreEquipo+"?");
            $("#eliminar_id").val(eliminar_id);
        });
        
        $("#editar-personal").click(function(){
            var personal=$(this).attr('personal');
            $("#personal_id").val(personal);
            $.get( "/university/services/laboratorio/personal/editar/"+personal, function( data ) {
              console.log(data);
              $("#carrera").val(data.carrera);
              $("#nombre").val(data.nombre);
              $("#grado").val(data.grado);
              $("#linea").val(data.lineas);
              $("#certificaciones").val(data.certificaciones);
            });
        });
        
        $("#editar-equipo").click(function(){
            var equipo=$(this).attr('equipo');
            $("#service_id").val(equipo);
            $.get( "/university/services/laboratorio/personal/editar/"+equipo, function( data ) {
              $("#inventario").val(data.inventario);
              $("#nombre_equipo").val(data.nombre);
              $("#marca").val(data.marca);
              $("#modelo").val(data.modelo);
              $("#descripcion").val(data.descripcion);
              $("#caracteristicas").val(data.caracteristicas);
              $("#capacidad").val(data.capacidad);
              $("#funcionalidad").val(data.funcionalidad);
              $("#trabajos").val(data.trabajos);
              $("#lineas_equipo").val(data.lineas);
              $("#servicios").val(data.servicios);
            });
        });
    });
</script>                 
@endsection
