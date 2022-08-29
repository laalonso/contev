@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <div class="col-md-12">
          <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Vacante</li>
                </ol>
            </nav>
        </div> 
          <div class="card">
                <div class="card-header">{{ __('Editar vacante') }}</div>

               <div class="card-body">
                        <form action="{{ url('/enterprise/vacancies/'.encrypt($info->id).'') }}" method="POST">
                            
                            
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="requerimientos">Puesto</label>
                                <input type="text" class="form-control{{ $errors->has('requerimientos') ? ' is-invalid' : '' }}" id="requerimientos" name="requerimientos" maxlength="200" value="{{ $info->requeriments }}" placeholder="Ingrese requerimientos" required autofocus>
                                @if ($errors->has('requerimientos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('requerimientos') }}</strong>
                                    </span>
                                @endif
                            </div>

                        
                            <div class="form-group col-md-3">
                                <label for="posicion">Perfil profesional</label>
                                <input type="text" class="form-control{{ $errors->has('posicion') ? ' is-invalid' : '' }}" id="posicion" name="posicion" maxlength="20" value="{{ $info->position}}" placeholder="Ingrese un teléfono" required autofocus>
                                @if ($errors->has('posicion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('posicion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            

                            <div class="form-group col-md-3">
                                <label for="tipo">Lugar de trabajo</label>
                                <input type="text" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" id="tipo" name="tipo" maxlength="200" value="{{ $info->type}}" placeholder="Ingrese un tipo" required autofocus>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="lugar">Salario Mensual</label>
                                <input type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" id="lugar" name="lugar" maxlength="20" value="{{ $info->place}}" placeholder="Ingrese un teléfono" required autofocus>
                                @if ($errors->has('lugar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lugar') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          <!--      
                            <div class="form-group col-md-12">
                                  <label for="descripcion">Descripciòn</label>
                                <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripción" rows="5" maxlength="255" autofocus required>{{ $info->description}}</textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>-->
                        <div class="row">
                          
                        <div class="form-group col-md-4">
                                <label for="requerimientos">Lugar de trabajo</label>
                                <input type="text" class="form-control{{ $errors->has('requerimientos') ? ' is-invalid' : '' }}" id="requerimientos" name="requerimientos" maxlength="200" value="{{ $info->requirements}}" placeholder="Ingrese un tipo" required autofocus>
                                @if ($errors->has('requerimientos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('requerimientos') }}</strong>
                                    </span>
                                @endif
                            </div>
                          
                            <div class="form-group col-md-4">
                                <label for="responsabilidades">Responsabilidades del puesto</label>
                                <input type="text" class="form-control{{ $errors->has('responsabilidades') ? ' is-invalid' : '' }}" id="responsabilidades" name="responsabilidades" maxlength="200" value="{{ $info->responsibilities}}" placeholder="Ingrese un tipo" required autofocus>
                                @if ($errors->has('responsabilidades'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('responsabilidades') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="prestamos">Prestamos y beneficios</label>
                                <input type="text" class="form-control{{ $errors->has('prestamos') ? ' is-invalid' : '' }}" id="prestamos" name="prestamos" maxlength="200" value="{{ $info->loans}}" placeholder="Ingrese un tipo" required autofocus>
                                @if ($errors->has('prestamos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prestamos') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            
                        </div> 
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="enlace">enlace del test</label>
                                <input type="text" class="form-control{{ $errors->has('enlace') ? ' is-invalid' : '' }}" id="enlace" name="enlace" maxlength="200" value="{{ $info->test_link}}" placeholder="Ingrese un enlace"  autofocus>
                                @if ($errors->has('enlace'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('enlace') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group col-md-12" align="right">
                                  <a   href="{{ url('/enterprise/vacancies') }}" class="btn btn-secondary">Cancelar</a>
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                       
                    </form>
                </div>  
                 </div> 
                  </div> 
        </div>
    </div>
</div>
@endsection


@section('js')<div class="d-none">no soy visible</div>
<script>
$( document ).ready(function() {
    $("#telefono").inputmask({"mask": "(+52) 999-999-99-99"});
    $('#a_cargo').select2({
      language: {
        noResults: function() {
          return "No hay resultado";
        },
        searching: function() {
          return "Buscando..";
        }
      },
      placeholder: "Elija una opción",
    });
});
</script>
</script>

<script type="text/javascript">
$(function(){
    $('[data-toggle="tooltip"]').tooltip()
})

$('#ayuda'). tooltip('show') 
$(function(){
    $('[data-toggle="popover"]').popover()
})


</script>
@endsection
