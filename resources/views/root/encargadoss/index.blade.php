@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Encargados de empresas</li>
              </ol>
            </nav>
            
            <div class="card">
                <div  class="card-header">{{ __('LISTA DE ENCARGADOS ') }}</div>
                <input type="text" name="buscar" id="buscar-encargado" placeholder="BUSCAR">
                <div class="card-body">
                    
                      @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>NOMBRE COMPLETO</th>
                            <th>EMAIL</th>
                            <th>TELÉFONO</th>
                            <th>EMPRESAS</th>
                        </tr>
                        <tbody id="tabla-encargados">
@foreach($usuarios as $usuario)
                            <tr>
                                <td><div id="indice">{{$loop->index+1}}</div></td>
                                <td>{{$usuario->name}} {{$usuario->f_surname}} {{$usuario->s_surnamer}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->phone}}</td>
                                <td>
                                    <div id="enterprise_id">
@php
                                        if(isset($usuario->asignar()->first()->enterprise_id)){
                                      echo  $usuario->asignar()->first()->enterprise->name;
                                        }else{
                                            echo "Sin asignar";
                                        }
@endphp
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
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
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
  <!--     echo  $usuario->asignar()->first()->enterprise->name;-->
