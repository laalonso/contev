@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <div class="col-md-12">
          <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear vacante</li>
                </ol>
            </nav>
        </div> 
                 

                 <div class="d-none">{{$id_empresa}}</div>
                 
                   <div class="card">
                <div class="card-header">{{ __('Crear vacante') }}</div>

                <div class="card-body">
                   <form action="/enterprise/vacancies" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="requerimientos">Puesto</label>
                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"  data-toggle="tooltip"
                          data-placement="left" title="Escriba el puesto de trabajo"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('requerimientos') ? ' is-invalid' : '' }}" id="requerimientos" name="requerimientos" maxlength="200" value="{{ old('requerimientos') }}" placeholder="Ejemplo:Supervisor, Gerente, Encargado, auxiliar, etc" required autofocus>
                                </div>
                                @if ($errors->has('requerimientos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('requerimientos') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
               
                            <div class="form-group col-md-3">
                                <label for="posicion">Perfil profesional</label>
                                 <div class="input-group">
                                  <div class="input-group-prepend">
                                        <span class="input-group-text"  data-toggle="tooltip"
                          data-placement="left" title="Ingrese el perfil profesional"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('posicion') ? ' is-invalid' : '' }}" id="posicion" name="posicion" maxlength="20" value="{{ old('posicion') }}" placeholder="Ingeniero" required autofocus>
                                </div>
                                @if ($errors->has('posicion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('posicion') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3">
                                <label for="tipo">Salario Mensual</label>
                                 <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" id="tipo" name="tipo" maxlength="200" value="{{ old('tipo') }}" placeholder="$2000 mensuales" required autofocus>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                                  <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="tooltip"
                                                          data-placement="right" title="Ingrese el salario que ofrece para esta vacante"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Que hacer-->
                             <div class="form-group col-md-3">
                                <label for="lugar">Lugar de trabajo</label>
                                 <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('lugar
                                ') ? ' is-invalid' : '' }}" id="lugar" name="lugar" maxlength="200" value="{{ old('lugar') }}" placeholder="Ingrese un lugar" required autofocus>
                                @if ($errors->has('lugar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lugar') }}</strong>
                                    </span>
                                @endif
                                  <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="tooltip"
                                                          data-placement="right" title="Ejemplo: Veracruz colonia centro"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg></span>
                                    </div>
                                </div>
                            </div>
                           
                        </div>    
                      <!--      
                            <div class="form-group col-md-12">
                                  <label for="descripcion">Descripciòn de la vacante</label>
                                <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripción" rows="5" maxlength="255" autofocus required>{{ old('descripcion') }}</textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
-->

                             <div class="row">
                                  <div class="form-group col-md-4">
                                <label for="requerimientos">Requisitos del puesto</label>
                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"  data-toggle="tooltip"
                          data-placement="left" title="Ejemplo: Habilidades y conocimientos especiales, tales como idiomas o informatica"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('requerimientos') ? ' is-invalid' : '' }}" id="requerimientos" name="requerimientos" maxlength="200" value="{{ old('requerimientos') }}" placeholder="Ejemplo: Habilidades y conocimientos especiales, tales como idiomas o inform��tica." required autofocus>
                                </div>
                                @if ($errors->has('requerimientos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('requerimientos') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
               
                            <div class="form-group col-md-4">
                                <label for="responsabilidades">Responsabilidades del puesto</label>
                                 <div class="input-group">
                                  <div class="input-group-prepend">
                                        <span class="input-group-text"  data-toggle="tooltip"
                          data-placement="left" title="Ingrese las responsabilidades que necesita la empresa"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('responsabilidades') ? ' is-invalid' : '' }}" id="responsabilidades" name="responsabilidades" maxlength="20" value="{{ old('responsabilidades') }}" placeholder="El siguiente campo es obligatorio" required autofocus>
                                </div>
                                @if ($errors->has('responsabilidades'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('responsabilidades') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="prestamos">Prestamos y beneficios</label>
                                 <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('prestamos') ? ' is-invalid' : '' }}" id="prestamos" name="prestamos" maxlength="200" value="{{ old('prestamos') }}" placeholder="Ingrese el tipo de prestamos" required autofocus>
                                @if ($errors->has('prestamos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prestamos') }}</strong>
                                    </span>
                                @endif
                                  <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="tooltip"
                                                          data-placement="right" title="Ejemplo: Seguro de vida"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg></span>
                                    </div>
                                </div>
                            </div>
                            
                          
                             </div>
                             
                            <div class="row">
                            <div class="form-group col-md-12">
                                <label for="enlace">Enlace del test</label>
                                <input type="text" class="form-control{{ $errors->has('enlace') ? ' is-invalid' : '' }}" id="enlace" name="enlace" maxlength="200" value="{{ old('enlace') }}" placeholder="Ingrese un enlace"  autofocus>
                                @if ($errors->has('enlace'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('enlace') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div> 
                      
                     
                        <div class="row">
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
