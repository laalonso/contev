@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/university/students">Lista de evaluaciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de evaluaciones</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">  {{ __('EVALUACIONES DE: ') }}<strong> {{$estudiante->user->name}} {{$estudiante->user->f_surname}} {{$estudiante->user->s_surname}}</strong>
                    <br> MATRÍCULA: <strong>{{$estudiante->enrollment}}</strong>
                </div>
                <div class="card-body">

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
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Archivo</th>
                        </thead>
                        <tbody>
                            <!-- {{$i = 1}} -->
                            @foreach($evaluaciones as $info)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $info->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary show-modal" id="{{$info->file}}">
                                    Ver
                                    </button>
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

<!-- Modal -->
<div class="modal fade" id="showm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12" align="center" id="content_archivo">
    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>

@endsection

@section('js')
<script>
    $(document).ready(function() {

        $(".show-modal").on('click',function () {
            var ido = $(this).attr('id');
            $("#content_archivo").html('<embed src="http://conexion-tecnologicav2.projects-itsz.com/public/img/'+ido+'") }}" type="application/pdf" width="100%" height="500px" />');
            $('#showm').modal('show');
        });

    });
</script>
@endsection
