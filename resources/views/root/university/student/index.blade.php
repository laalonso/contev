@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('ESTUDIANTES') }}</div>
                
                <div class="card-body">
                   <a href="{{ url('/university/students/create') }}" class="btn btn-success">Añadir Estudiante</a> <br><br>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="td-estu" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Postulaciones</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Email Escolar</th>
                                    <th scope="col">Opciones</th>
                                
                                </tr>
                            </thead>
                            <tbody id="tabla-estudiantes">
    @foreach($estudiantes as $estudiante)
                                <tr id="{{$loop->index+1}}">
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$estudiante->enrollment}}</td>
                                    <td>{{$estudiante->user->name}}{{$estudiante->user->f_surname}} {{$estudiante->user->s_surname}}</td>
                                    <td><div class="carrera-estudiante d-none">{{$estudiante->program_id}}</div></td>
                                    <td>
                                    @php
                                        $estado="";
                                        if($estudiante->vacancies->count()==0){
                                            $estado="disabled";
                                        }
                                    @endphp
                                        <a class="btn btn-primary {{$estado}}" href="/university/estudiante/vacancies/{{encrypt($estudiante->id)}}" role="button">
                                            Ver <span class="badge badge-light">{{$estudiante->vacancies->count()}}</span>
                                        </a>
                                    </td>
                                    <td>{{$estudiante->status}}</td>
                                    <td>{{$estudiante->user->phone}}</td>
                                    <td>{{$estudiante->user->email}}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opción
                                        </button>
                                        <div class="dropdown-menu">
                                            @if(!empty($estudiante->cv))
                                                <a class="dropdown-item" target="_blank" href="https://conexioneeveracruz.org/img/{{$estudiante->cv}}">Ver CV</a>
                                            @else
                                            <a class="dropdown-item" >CV Pendiente</a>
                                            @endif
                                            <a class="dropdown-item" href="/university/estudiante/listaEvaluaciones/{{encrypt($estudiante->id)}}">Lista de Evaluaciones</a>
                                            <a class="dropdown-item" href="/university/students/{{encrypt($estudiante->id)}}/edit">Editar información</a>
                                            <a class="dropdown-item" href="#">Eliminar</a>
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

<script>
	 $('#td-estu').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection