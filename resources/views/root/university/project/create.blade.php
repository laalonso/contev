@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Proyecto</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('Crear Proyecto') }}</div>

                <div class="card-body">
                    <form action="{{ url('/university/projects') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="60" value="{{ old('nombre') }}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="progreso">Progreso</label>
                                <select class="form-control form-select form-select-lg" name="progreso" id="progreso" autofocus required>
                                    <option value="" selected>Elija una opción</option>
                                    <option value="Desarrollo" style="background-color:red;color:white;">En Desarrollo</option>
                                    <option value="Testing" style="background-color:orange;color:white;">En Testing</option>
                                    <option value="Invertir" style="background-color:yellow;color:black;">Listo para Inversión</option>
                                    <option value="Mercado" style="background-color:green;color:white;">Listo para el Mercado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="palabras_clave">Palabras Clave</label>
                                <input type="text" class="form-control{{ $errors->has('palabras_clave') ? ' is-invalid' : '' }}" id="palabras_clave" name="palabras_clave" maxlength="45" value="{{ old('palabras_clave') }}" placeholder="Ingrese palabras clave" required autofocus>
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
                                <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripción" rows="5" maxlength="255" autofocus required>{{ old('descripcion') }}</textarea>
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

    });
</script>
@endsection
