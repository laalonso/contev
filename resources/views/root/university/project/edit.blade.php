@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar Proyecto') }}</div>

                <div class="card-body">
                    <form action="{{ url('/university/projects/'.encrypt($all3->id).'') }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="60" value="{{ $all3->name }}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="progreso">Progreso</label>
                                <select class="form-control form-select form-select-lg" name="progreso" id="progreso" autofocus required>
                                    <option value="{{ $all3->progress }}" selected>{{ $all3->progress }}</option>
                                    <option value="Desarrollo" style="background-color:red;color:white;">En Desarrollo</option>
                                    <option value="Testing" style="background-color:orange;color:white;">En Testing</option>
                                    <option value="Invertir" style="background-color:yellow;color:black;">Listo para Inversión</option>
                                    <option value="Mercado" style="background-color:green;color:white;">Listo para el Mercado</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="palabras_clave">Palabras Clave</label>
                                <input type="text" class="form-control{{ $errors->has('palabras_clave') ? ' is-invalid' : '' }}" id="palabras_clave" name="palabras_clave" maxlength="45" value="{{ $all3->keywords }}" placeholder="Ingrese palabras clave" required autofocus>
                                @if ($errors->has('palabras_clave'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('palabras_clave') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <div class="form-group col-md-6">
                              <label for="formFile" class="form-label">Imagen del proyecto</label>
                              <input class="form-control" name="imagen" type="file" id="imagen">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripción" rows="5" maxlength="255" autofocus required>{{ $all3->description }}</textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>                          
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" align="right">
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {

        $('.universidad').select2({
            language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
            },
            placeholder: 'Elija una opción'
        }).width("100%");

        var collaborators = @json($all4);
        var datos = [];
        for (i=0;i<collaborators.length;i++) {
            datos.push(collaborators[i]['student_id']);
		}
        $('.estudiantes').val(datos);

        $('.estudiantes').select2({
            language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
            },
            placeholder: 'Elija una opción'
        }).width("100%");

    });
</script>
@endsection
