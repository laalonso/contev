@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/root/university/all">Universidades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Notificaciones</li>
          </ol>
        </nav>
        
        <div class="card">
            <div  class="card-header" id="titulo">LISTA DE NOTIFICACIONES</div>
            <div class="card-body">
                <div class="dropdown py-3">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    Filtrar notificaciones
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/root/university/notificaciones/filtro/nuevas">Nuevas</a>
                    <a class="dropdown-item" href="/root/university/notificaciones/filtro/leidas">Leídas</a>
                    <a class="dropdown-item" href="/root/university/notificaciones/filtro/todas">Todas</a>
                  </div>
                </div>
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
                            <th scope="col">Fecha</th>
                            <th scope="col">Notificación</th>
                            <th scope="col">Institución</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-uni">
                        @foreach(@$notificaciones as $notificacion)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$notificacion->created_at}}</td>
                                <td>{{$notificacion->descripcion}}</td>
                                <td>{{$notificacion->university_id}}</td>
                                <td></td>
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