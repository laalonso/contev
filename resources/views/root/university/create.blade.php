@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/root/university/all">Universidades</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asignar Encargado</li>
              </ol>
            </nav>

            <div class="card">
                <div id="uni-encargado" class="card-header">{{ __('Asiganar Encargado de ') }}</div>
                <input type="text" name="buscar" id="buscar-encargado" placeholder="BUSCAR">
                <div class="card-body">
                    
                    <input type="hidden" id="id_universidad" name="id_universidad" value="{{$id_universidad}}">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>NOMBRE COMPLETO</th>
                            <th>EMAIL</th>
                            <th>TELÉFONO</th>
                            <th>ASIGNAR</th>
                        </tr>
                        <tbody id="tabla-encargados">
@foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$usuario->name}} {{$usuario->f_surname}} {{$usuario->s_surnamer}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->phone}}</td>
                                <td><a class="btn btn-primary" href="/root/university/encargado/{{$usuario->id}}/{{$id_universidad}}" role="button">Asignar</a></td>
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
<script type="text/javascript">
    $(document).ready(function(){
        var id_universidad=$("#id_universidad").val();

         $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_universidad, function(data){
                var titulo=$("#uni-encargado").text();

                $("#uni-encargado").text(titulo+" "+data[0].Nombre);

            });

         $("#buscar-encargado").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-encargados tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
    });
</script>

@endsection
