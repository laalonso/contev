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
                     {{ __('Proyectos del ') }} <span id="uni" class="d-none">
                     {{$id_universidad}}
                     </span>
                </div>
                
                 <input type="text" name="buscar" id="buscar-pro" placeholder="BUSCAR">
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Progreso</th>
                                <th scope="col">Colaboradores</th>
                              <!--  <th scope="col">Contactar</th>-->
                               
                            </tr>
                        </thead>
                        <tbody id="tabla-proye">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->progress }}</td>
                                <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Equipo
                                      </button>
                                      <div class="dropdown-menu">
                                    <!--    <a class="dropdown-item" href="/university/projects/addStudent/{{encrypt($info->id)}}">Agregar</a>-->
                                        <a class="dropdown-item" href="/university/projects/details/{{encrypt($info->id)}}">Ver Detalles  </a>
                                      </div>
                                    </div>
                                </td>
                              <!-- <td>
                                    <a href="{{ url('/root/university/projects/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/root/university/projects/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>   -->                     
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
<script type="text/javascript">
  $(document).ready(function() {
        var id_universidad=$("#uni").text();
        $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_universidad, function(data){
                $("#uni").html(data[0].Nombre);
                $("#uni").removeClass("d-none");
                $("#uni").addClass("d-line");
                
                  ///alert (id_universidad);
                 //alert  (data[0].Nombre);
            });
            
  });    
  $("#buscar-pro").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-proye tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
                 
          

  
</script>
@endsection