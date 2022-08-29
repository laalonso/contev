@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/university/services">Servicios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Servicio</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('Editar Servicio') }}</div>

                <div class="card-body">
                        <form action="{{ url('/university/services/'.encrypt($info->id).'') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="60" value="{{ $info->name }}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tipo">Tipo</label>
                                <input type="text" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" id="tipo" name="tipo" maxlength="45" value="{{ $info->type }}" placeholder="Ingrese un tipo" required autofocus>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripción del servicio" rows="5" maxlength="255" autofocus required>{{ $info->description }}</textarea>
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
        }).width("100%");
    });
</script>
@endsection
