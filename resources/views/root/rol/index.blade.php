@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
              </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('ROLES') }}</div>
                <div class="card-body">
                <a href="{{ url('/root/rol/all/create') }}" class="btn btn-success">Añadir nuevo Rol</a><br><br>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="td-roles" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{$i = 1}} -->
                                @foreach($all as $rol)
                                <tr class="align-middle">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $rol->name }}</td>
                                    <td>
                                        <a href="{{ url('/root/rol/all/'.encrypt($rol->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ url('/root/rol/all/'.encrypt($rol->id)) }}" onclick="return(confirm('¿Estás seguro de querer eliminar este Rol?'))" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#td-roles').DataTable({
        "order": [],
        language: {
                url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
            }
    });
    </script>
@endsection
