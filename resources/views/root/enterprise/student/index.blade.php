@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/university/services">Vacantes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Buscar un candidato</li>
                </ol>
            </nav>


            <div class="card">
              <div class="card-header">{{ __('Buscar un candidato') }}</div>
                 <input type="text" name="buscar" id="buscar-estu" placeholder="BUSCAR">



               
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo Electrónico</th>
                                 <th scope="col">Habilidades</th>
                                <th scope="col">Opciones</td>
                               
                            </tr>
                        </thead>

                    <tbody id="tabla-estudiantes">
                        @foreach($estudiantes as $estudiante)
                            <tr id="{{$loop->index+1}}">
                                <th scope="row">{{$loop->index+1}}</th>
                         <!--       <td>{{$estudiante->enrollment}}</td>-->
                                <td>
                                {{$estudiante->user->name}}
                                 @php 
                                       $input = "{$estudiante->user->f_surname}";
                                          echo substr($input, 0, 2) . str_repeat('*', strlen($input) - 1);
                                   @endphp
                                    @php 
                                       $input = "{$estudiante->user->s_surname}";
                                          echo substr($input, 0, 2) . str_repeat('*', strlen($input) - 1);
                                   @endphp


                                </td>
                                <td><div class="carrera-estudiante d-none">{{$estudiante->program_id}}</div></td>
                              
                                <td>{{$estudiante->status}}</td>
                                <td>
                                @php 
                                    $input = "{$estudiante->user->phone}";
                                       echo substr($input, 0, 9) . str_repeat('*', strlen($input) - 9);
                                @endphp
                                </td>
                                <td>
                                @php 
                                    $input = "{$estudiante->user->email}";
                                       echo substr($input, 0, 3) . str_repeat('*', strlen($input) - 3);
                                @endphp
                                </td>
                                    <td>{{$estudiante->habilidades}}</td>
                                    
                                
                                <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Opción  
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" target="_blank" href="https://conexioneeveracruz.org/img/{{$estudiante->cv}}">Ver CV</a>
                                                                                      
                                        <a class="dropdown-item" href="/enterprise/estudiante/listaEvaluaciones/{{encrypt($estudiante->id)}}">Lista de Evaluaciones</a>
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
                    <div class="col-md-12" align="center" id="content_cv"></div>
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
    
  
  $("#buscar-estu").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-estudiantes tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
               
            
</script>
@endsection