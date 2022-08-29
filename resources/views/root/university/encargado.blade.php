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
                <div id="uni-encargado" class="card-header">{{ __('Encargado Asignado al Plantel') }}</div>
                <div class="card-body">
                    
                    <input type="hidden" id="id_universidad" name="id_universidad" value="{{$universidad->university_id}}">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>NOMBRE COMPLETO</th>
                            <th>EMAIL</th>
                            <th>TELÉFONO</th>
                            <th>ELIMINAR</th>
                        </tr>
                        <tbody id="tabla-encargados">
                            <tr>
                                <td>1</td>
                                <td>{{$usuario->name}} {{$usuario->f_surname}} {{$usuario->s_surname}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->phone}}</td>
                                <td><a class="btn btn-danger" href="/root/university/encargado/universidad/eliminar/{{encrypt($universidad->id)}}" role="button">Eliminar</a></td>
                            </tr>
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
    });
</script>

@endsection