@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de evaluaciones</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">  {{ __('EVALUACIONES') }}</div>
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Añadir Certificado o Comprobante
                </button>   <br><br>    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="td-evaluaciones" class="table table-striped table-bordered">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Archivo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
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
                                    <td>
                                        <a href="{{ url('/estudiantes/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/estudiantes/'.encrypt($info->id)) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
            <form method="POST" action="{{ url('/estudiantes') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->has('student'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('student') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="evaluacion">Nombre de la evaluación</label>
                            <input type="text" name="evaluacion" class="form-control{{ $errors->has('evaluacion') ? ' is-invalid' : '' }}" id="evaluacion" maxlength="100" placeholder="Ingrese un nombre" value="{{ old('evaluacion') }}" required autofocus>
                            @if ($errors->has('evaluacion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('evaluacion') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label for="descripcion">Descripción de la evaluación</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                            @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label for="archivo_evaluacion">Archivo comprobante o certificado</label>
                            <input type="file" class="form-control{{ $errors->has('archivo_evaluacion') ? ' is-invalid' : '' }}" id="archivo_evaluacion" name="archivo_evaluacion" accept="application/pdf" value="{{ old('archivo_evaluacion') }}" required autofocus>
                            @if ($errors->has('archivo_evaluacion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('archivo_evaluacion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="float-right  btn btn-primary" value="Guardar">
            </form>                 
        </div>
      </div>      
    </div>
  </div>
<!-- Fin del modal -->

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
            $("#content_archivo").html('<embed src="https://conexioneeveracruz.org/img/'+ido+'") }}" type="application/pdf" width="100%" height="500px" />');
            $('#showm').modal('show');
        });

    });
</script>
<script>
	 $('#td-evaluaciones').DataTable({
         "order": [],
         language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection
