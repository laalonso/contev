@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/university/projects">Proyectos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles del Proyecto</li>
              </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                     {{ __('PROYECTO : ') }} {{$proyecto->name}}
                </div>
                <div class="card-body table-responsive">
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h5 class="card-title">Progreso: {{$proyecto->progress}}</h5>
                    <hr>
                    <h5 class="card-title">Descripción:</h5>
                    <p class="card-text">{{$proyecto->description}}</p>
                    <hr>
                    <h5 class="card-title">Palabras clave:</h5>
                    <p class="card-text">{{$proyecto->keywords}}</p>
                    <hr>
                    <h5 class="card-title">Integrantes del Equipo:</h5>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Matrícula</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Carrera</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-estudiantes">
@foreach($proyecto->students as $student)
                        <tr id="f{{$loop->index+1}}">
                            <th>{{$loop->index+1}}</th>
                            <td>{{$student->enrollment}}</td>
                            <td>{{$student->user->name}} {{$student->user->f_surname}} {{$student->user->s_surname}}</td>
                            <td>
                                <div class="carrera d-none">{{$student->program_id}}</div>
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