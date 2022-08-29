@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vacantes</li>
                </ol>
            </nav>
       <div class="card">
                <div class="card-header">{{ __('VACANTES DISPONIBLES DE LA EMPRESA') }}</div>
                  <input type="text" name="buscar" id="buscar-vac" placeholder="BUSCAR">
              
                <div class="card-body">
                <a href="{{ url('/enterprise/vacancies/create') }}" class="btn btn-success" role="botton">Añadir</a><br><br>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Requerimientos</th>
                                <th scope="col">Posicion </th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Prestamos</th>
                                 <th scope="col">Postulaciones</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="tabla-vact">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $info->requeriments }}</td>
                                <td>{{ $info->position }}</td>
                                   <td>{{ $info->type }}</td>
                                   <td>{{ $info->loans }}</td>
                                    <td>
                                    <a class="btn btn-primary" href="/enterprise/vacancies/universidades/postuladas/{{$info->id}}" role="button">
                                        Ver <span class="badge badge-light">{{$info->students->count()}}</span>
                                    </a>
                                 </td>
                                <td>
                                    <a href="{{ url('/enterprise/vacancies/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/enterprise/vacancies/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
@endsection

@section('js')
<script type="text/javascript">
  $("#buscar-vac").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-vact tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
                 </script>
@endsection
