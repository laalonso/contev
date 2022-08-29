@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/root/university/all">Universidades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
          </ol>
        </nav>
        
        <div class="card">
            <div  class="card-header" id="titulo">LISTA DE PROYECTOS</div>
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
        
                <table id="tb-proyectos" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Avance</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Portada</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-uni">
                        @foreach($proyectos as $proyecto)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$proyecto->name}}</td>
                                <td>{{$proyecto->progress}}</td>
                                <td>{{$proyecto->description}}</td>
                                <td><img width="50" class="img-fluid" src="{{asset('/img/'.$proyecto->imagen)}}" alt=""></td>
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
        $("#titulo").text("LISTA DE PROYECTOS: "+data[0].Nombre);
    });
    
        $.ajaxSetup({async : true});
    	$('#tb-proyectos').DataTable({
                  "order": [],
                  language: {
                          url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
                      }
                 });
</script>
@endsection