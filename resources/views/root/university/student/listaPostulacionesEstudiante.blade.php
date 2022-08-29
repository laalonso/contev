@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/university/students">Estudiantes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Postulaciones de los estudiantes</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    ESTUDIANTE: {{$estudiante->user->name}} {{$estudiante->user->f_surname}} {{$estudiante->user->s_surname}}
                    <div>MATRÍCULA: {{$estudiante->enrollment}}</div>
                    <div>ESTATUS: {{$estudiante->status}}</div>
                </div>
                <input type="text" name="buscar" id="buscar-vacante" placeholder="BUSCAR">
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h2>LISTA DE POSTULACIONES DEL ESTUDIANTE</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Contrato</th>
                                <th scope="col">Requisitos</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Empresa</th>

                            </tr>
                        </thead>
                        <tbody id="tabla-vacantes">
                            <!-- {{$i = 1}} -->
                            @foreach($estudiante->vacancies as $vacante)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $vacante->position }}</td>
                                <td>{{ $vacante->type }}</td>
                                <td>{{ $vacante->requeriments }}</td>
                                <td>{{ $vacante->description }}</td>
                                <td>{{ $vacante->enterprise->name }}</td>
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
        $(document).ready(function (){
            
             $("#buscar-vacante").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-vacantes tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
        });
    </script>
@endsection
