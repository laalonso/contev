@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/root/enterprise/all">Empresas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asignar Encargado</li>
              </ol>
            </nav>

            <div class="card">
                <div  class="card-header">{{ __('Encargado Asignado a la Empresa') }} - <strong>{{$empresa->enterprise->name}} </strong></div>
                <div class="card-body">
                 
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
                                <td>{{$usuario->name}} {{$usuario->f_surname}} {{$usuario->s_surnamer}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->phone}}</td>
                               
                                   <td><a class="btn btn-danger" href="/root/enterprise/encargado/empresa/eliminar/{{encrypt($empresa->id)}}" role="button">Eliminar</a></td>
                                
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


@endsection

<!-- <td><a class="btn btn-danger" href="/root/enterprise/eliminar/encargado/{{$empresa->id}}" role="button">Eliminar</a></td>-->