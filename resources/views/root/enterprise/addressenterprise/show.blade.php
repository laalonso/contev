@extends('layouts.app')

@section('title','Direcciones / CONTEV')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  {{ __('DIRECCIONES') }} - <strong> {{ $all->name }} </strong></div>
                <a href="{{ url('/root/addressenterprise/all/create2/'.encrypt($all->id).'') }}" class="btn btn-success" role="button">Añadir</a>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Calle</th>
                            <th scope="col">Número</th>
                            <th scope="col">Código Postal</th>
                          
                            <th scope="col">Estado</th>
                            <th scope="col">Municipio</th>
                            <th scope="col">Localidad</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <!-- {{$i = 1}} -->
                            @foreach($addresses as $info)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $info->street }}</td>
                                <td>{{ $info->number }}</td>
                                <td>{{ $info->zip_code }}</td>
                                  <td>{{ $info->locality->municipality->state->name }}</td>
                              <td>{{ $info->locality->municipality->name }}</td>
                              <td>{{ $info->locality->name }}</td>
                                <td>
                                    <a href="{{ url('/root/addressenterprise/all/'.encrypt($info->id).'/edit') }}" onclick="return(confirm('¿Estás seguro de querer editar la información de la dirección?'))" class="btn btn-info" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/root/addressenterprise/all/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return(confirm('¿Estás seguro de querer eliminar la dirección?'))">Eliminar</button>
                                    </form>
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
</div>
@endsection
