@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
              </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('USUARIOS') }}</div>

                <div class="card-body">
                <a href="{{ url('/root/user/all/create') }}" class="btn btn-success">Añadir Usuario</a><br><br>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="td-usuarios" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tabla-usuarios">
                                <!-- {{$i = 1}} -->
                                @foreach($all as $info)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $info->name }} {{ $info->f_surname }} {{ $info->s_surname }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->role->name }}</td>
                                    <td> 
                                        <a href="{{ url('/root/user/all/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a> 
                                    </td>
                                    <td>
                                        <form action="{{ url('/root/user/all/'.encrypt($info->id)) }}" onclick="return(confirm('¿Estás seguro de querer eliminar este Usuario?'))" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-outline-danger" value="Eliminar">
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

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $("#buscar-usuario").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-usuarios tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
    });
</script>
<script>
	 $('#td-usuarios').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection
