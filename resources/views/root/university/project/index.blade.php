@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                     {{ __('PROYECTOS DE ') }} <span id="uni" class="d-none">
                     {{ $id_universidad}}
                     </span>
                </div>

                <div class="card-body table-responsive">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Añadir Proyecto
</button>   <br><br>                      @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
<div class="table-responsive">
                    <table id="td-proyectos" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Img</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Progreso/Avance</th>
                                <th scope="col">Colaboradores</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- {{$i = 1}} -->
    @foreach($all as $info)
                            <tr>
                                <th class="align-middle" scope="row">{{ $i++ }}</th>
                                <th class="align-middle">
                                    <img style="cursor:zoom-in; ;width: 100px;height: 100px;" src="{{asset('img/'.$info->imagen)}}" class="image img-thumbnail">
                                </th>
                                <td class="align-middle">{{ $info->name }}</td>
@php
                                $fondo="";
                                switch($info->progress){
                                    case "Desarrollo":
                                        $fondo="progress-bar progress-bar-striped progress-bar-animated bg-danger";
                                        $progreso=25;
                                        break;
                                    case "Testing":
                                        $fondo="progress-bar progress-bar-striped progress-bar-animated bg-warning";
                                        $progreso=50;
                                        break;
                                    case "Invertir":
                                        $fondo="progress-bar progress-bar-striped progress-bar-animated bg-info";
                                        $progreso=75;
                                        break;
                                    case "Mercado":
                                        $fondo="progress-bar progress-bar-striped progress-bar-animated bg-success";
                                        $progreso=100;
                                        break;
                                    default:
                                        $fondo="progress-bar progress-bar-striped progress-bar-animated bg-danger";
                                        $progreso=25;
                                }
                                    
@endphp
                            <td class="align-middle" style="text-align:center;font-weight:bolder;">
                                <span>{{$progreso}}%</span>
                                <div class="progress">
                                    <div class="{{$fondo}}" role="progressbar" style="width: {{$progreso}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Equipo
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/university/projects/addStudent/{{encrypt($info->id)}}">Agregar</a>
                                        <a class="dropdown-item" href="/university/projects/details/{{encrypt($info->id)}}">Ver Detalles  </a>
                                      </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ url('/university/projects/'.encrypt($info->id).'/edit') }}" class="btn btn-sm btn-warning" role="button">Editar</a>
                                </td>
                                <td class="align-middle">
                                    <form action="{{ url('/university/projects/'.encrypt($info->id)) }}" onclick="return(confirm('¿Estás seguro de querer eliminar este Proyecto?'))" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" role="button">Eliminar</button>
                                    </form>
                                </td>                        
                            </tr>
@endforeach
                        </tbody>
                    </table>
</div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="img-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="img-modal-label"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img class="img-fluid" id="img-modal-ruta" src="">
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        <form action="{{ url('/university/projects') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="60" value="{{ old('nombre') }}" placeholder="Ingrese un nombre" required autofocus>
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="progreso">Progreso</label>
                        <select class="form-control form-select form-select-lg" name="progreso" id="progreso" autofocus required>
                            <option value="" selected>Elija una opción</option>
                            <option value="Desarrollo" style="background-color:red;color:white;">En Desarrollo</option>
                            <option value="Testing" style="background-color:orange;color:white;">En Testing</option>
                            <option value="Invertir" style="background-color:yellow;color:black;">Listo para Inversión</option>
                            <option value="Mercado" style="background-color:green;color:white;">Listo para el Mercado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="palabras_clave">Palabras Clave</label>
                        <input type="text" class="form-control{{ $errors->has('palabras_clave') ? ' is-invalid' : '' }}" id="palabras_clave" name="palabras_clave" maxlength="45" value="{{ old('palabras_clave') }}" placeholder="Ingrese palabras clave" required autofocus>
                        @if ($errors->has('palabras_clave'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('palabras_clave') }}</strong>
                            </span>
                        @endif
                    </div>

                        <div class="form-group col-md-6">
                        <label for="formFile" class="form-label">Imagen del proyecto</label>
                        <input class="form-control" name="imagen" type="file" id="imagen">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripción" rows="5" maxlength="255" autofocus required>{{ old('descripcion') }}</textarea>
                        @if ($errors->has('descripcion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="float-right btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>              
        </div>
      </div>      
    </div>
  </div>


</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var id_universidad=$("#uni").text();

        $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_universidad, function(data){
                $("#uni").html(data[0].Nombre);
                $("#uni").removeClass("d-none");
                $("#uni").addClass("d-line");
                
                  ///alert (id_universidad);
                 //alert  (data[0].Nombre);
            });

        $(".image").click(function(){
            var img=$(this).attr("src");
            var nombre=$(this).parent().next().text();

            $("#img-modal-label").text("PROYECTO: "+nombre.toUpperCase());
            $("#img-modal-ruta").attr("src",img);
            $("#img-modal").modal('show');
        });
    
    });
</script>
<script>
	 $('#td-proyectos').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>

@endsection