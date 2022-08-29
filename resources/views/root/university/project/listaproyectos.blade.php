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
                 <div class="card-header">{{ __('Proyectos de universidades') }}</div>
                   
                    <input type="text" name="buscar" id="buscar-pro" placeholder="BUSCAR">
                
                
                
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
                                 <th scope="col">Universidad</th>
                                <th scope="col">Colaboradores</th>
                                
                            </tr>
                        </thead>
                        <tbody id="tabla-proyectos">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                  <td><div id="indice">{{$loop->index+1}}</div></td>
                                <td>{{ $info->name }}</td>
                                
                                @php
                                $fondo="";
                                switch($info->progress){
                                    case "Desarrollo":
                                        $fondo="danger";
                                        break;
                                    case "Testing":
                                        $fondo="warning";
                                        break;
                                    case "Invertir":
                                        $fondo="success";
                                        break;
                                    case "Mercado":
                                        $fondo="primary";
                                        break;
                                    default:
                                        $fondo="danger";
                                }
                                    
@endphp
                                <td bgcolor="" style="text-align:center;color:white;font-weight:bolder;"><span style="font-size: 1.2em;" class="badge bg-{{$fondo}}">{{ $info->progress }}</span></td>
                            

                                <td>
                                  <div class="" id="universidad-nombre">{{$info->university_id}}</div>
                               </td>
                               
                              
                                <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Equipo
                                      </button>
                                      <div class="dropdown-menu">
                                      
                                        <a class="dropdown-item" href="/enterprise/projects/details/{{encrypt($info->id)}}">Ver Detalles  </a>
                                      </div>
                                    </div>
                                </td>
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
       //var id_universidad=$("#universidad-nombre").text();
        // $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdEscuelas/'+id_universidad, function(data){
          //      $("#universidad-nombre").html(data[0].Nombre);
           //     $("#universidad-nombre").removeClass("d-none");
            //    $("#universidad-nombre").addClass("d-block");
            //    console.log(id_universidad);
            //});
            
        $.each($("#tabla-proyectos tr"), function(index) {
        var university_id=$(this).find("#universidad-nombre").text();
        var id="university_id"+index;
        $(this).find("#universidad-nombre").attr('id',id);

        if(!isNaN(university_id)){
         //   https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdEscuelas/
          //  https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+university_id, function(data){
                    $("#tabla-proyectos tr").find("#"+id).html(data[0].Nombre);
             });   
        }else{
            $(this).attr("class","table-danger");
        }

        });
           
    });
    
    
  $("#buscar-pro").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-proyectos tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
    
    
</script>
@endsection

