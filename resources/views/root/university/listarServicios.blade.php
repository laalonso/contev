@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/root/university/all">Universidades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Servicios</li>
          </ol>
        </nav>
        
        <div class="card">
            <div  class="card-header" id="titulo">LISTA DE SERVICIOS</div>
            <input type="hidden" id="institucion_id" value="{{$institucion_id}}">
            <div class="card-body">        
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
        
                <table id="tb-servicios" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Oferta</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="tabla-uni">
                        @foreach($servicios as $servicio)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$servicio->oferta}}</td>
                                <td>{{$servicio->type}}</td>
                                <td>{{$servicio->name}}</td>
                                <td>
                                    @if($servicio->oferta=="Laboratorio")
                                    <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                       Opciones
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/root/university/services/laboratorio/detalles/{{encrypt($servicio->id)}}">Equipos/Personal</a>
                                      </div>
                                    </div>
                                    @endif
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
@endsection
@section('js')
<script>
    var id_subsistema=$('#institucion_id').val();

    $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_subsistema, function(data){
        $("#titulo").text("LISTA DE SERVICIOS: "+data[0].Nombre);
    });
    
        $.ajaxSetup({async : true});
    	$('#tb-servicios').DataTable({
                  "order": [],
                  language: {
                          url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
                      }
                 });
</script>
@endsection