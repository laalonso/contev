@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/university/projects">Proyectos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar Estudiantes</li>
          </ol>
        </nav>

            <div class="card">
                <div class="card-header">{{ __('ESTUDIANTES DEL PROYECTO ') }} {{$proyecto->name}}</div>
                <a href="{{ url('/university/students/create') }}" class="btn btn-success">Añadir</a>
                <input class="form-control" type="text" id="buscar" name="buscar" placeholder="BUSCAR">
                <div class="card-body table-responsive">
                    
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
                                <th scope="col">Matrícula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Email Escolar</th>
                                <th scope="col">Agregar al Proyecto</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-estudiantes">
@foreach($estudiantes as $estudiante)
                            <tr id="f{{$loop->index+1}}">
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$estudiante->enrollment}}</td>
                                <td>{{$estudiante->user->name}} {{$estudiante->user->f_surname}} {{$estudiante->user->s_surname}}</td>
                                <td><div class="carrera d-none">{{$estudiante->program_id}}</div></td>
                                <td>{{$estudiante->status}}</td>
                                <td>{{$estudiante->user->email}}</td>
                                
                                <td> 
                                    <a class="btn btn-primary btn-block" href="/university/projects/addStudent/save/{{encrypt($proyecto->id)}}/{{encrypt($estudiante->id)}}" role="button">Agregar</a>
                                </td>
                                <td><br>                   
                              
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
<div class="modal fade" id="showm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Curriculum Vitae</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12" align="center" id="content_cv">

            </div>
        </div>
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

         $("#buscar").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-estudiantes tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
        });

        $("#tabla-estudiantes tr").each(function(){
            var fila=$(this).attr("id");
             var carrera_id=$(this).find(".carrera").text();
             $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdOferta/'+carrera_id, function(data){

                    $("#"+fila).find(".carrera").html(data[0].Nombre_Carrera);
                     $("#"+fila).find(".carrera").removeClass("d-none");
                     $("#"+fila).find(".carrera").addClass("d-block");
                });
        });
    });
</script>
@endsection