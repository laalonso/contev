@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('LISTA DE ALUMNOS INTERESADOS EN LA VACANTE') }}  <br>  {{ $vacante->requeriments }}  {{ $vacante->position }}   </div>
              
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
                           <!---<th scope="col">Teléfono</th>
                                <th scope="col">Correo electronico</th>
                                  -->                            
                                 <th scope="col">Habilidades</th>
                                   <th scope="col">Opciones</th>
                                
                              
                               
                            </tr>
                        </thead>
                  <tbody id="tabla-estudiantes">
          @foreach($vacante->students  as $estudianteS)
    @php
                                    $estudiante=App\Student::find($estudianteS->student_id);
    @endphp
                              <tr id="{{$loop->index+1}}">
                                <td>{{$loop->index+1}}</td>
                                 <td>{{$estudianteS->enrollment}}</td>
                                <td>{{$estudianteS->user->name}}{{$estudianteS->user->f_surname}} {{$estudianteS->user->s_surname}}</td>
                                 <td><div class="carrera-estudiante d-none">{{$estudianteS->program_id}}</div></td>
                             <td>{{$estudianteS->status}}</td>
                              <!-- <td>{{$estudianteS->user->phone}}</td>
                                <td>{{$estudianteS->user->email}}</td>-->
                                    <td>{{$estudianteS->habilidades}}</td>
                                      <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Opción
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" target="_blank" href="https://conexioneeveracruz.org/img/{{$estudianteS->cv}}">Ver CV</a>
                                        <a class="dropdown-item" href="/enterprise/estudiante/listaEvaluaciones/{{encrypt($estudianteS->id)}}">Lista de Evaluaciones</a>
                                       
                                      
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
            var carrera_id=$(this).find(".carrera-estudiante").text();

             $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdOferta/'+carrera_id, function(data){

                    $("#"+fila).find(".carrera-estudiante").html(data[0].Nombre_Carrera);
                   $("#"+fila).find(".carrera-estudiante").removeClass("d-none");
                   $("#"+fila).find(".carrera-estudiante").addClass("d-block");
                });
          });
    });
</script>
@endsection