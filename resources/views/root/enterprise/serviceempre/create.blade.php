@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Servicio</li>
                </ol>
            </nav>
                 
                  @foreach($all as $in)
               <h2 >{{ __('Empresa') }}  {{ $in->enterprise->name}}</h2> 
                    @endforeach
                    
                 <div class="d-none">{{$id_empresa}}</div>
            <div class="card">
                <div class="card-header">{{ __('Crear servicio a solitar') }}</div>

                <div class="card-body">
                    <form action="/enterprise/services" method="POST">
                      @csrf
                        <div class="row">
                       
                           
                          <div class="form-group col-md-4">
                                 <label for="nombre">Nombre del servicio</label>
                                   <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"  data-toggle="tooltip"
                          data-placement="left" title="Ejemplo: Mantenimiento de computadoras"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                
                                
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="200" value="{{ old('nombre') }}" placeholder="Ingrese un nombre" required autofocus>
                               </div>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="areas">Areas requerida</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                        <span class="input-group-text"  data-toggle="tooltip"
                          data-placement="left" title="Ingrese el area en el que se requiere el servicio"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('areas') ? ' is-invalid' : '' }}" id="areas" name="areas" maxlength="200" value="{{ old('areas') }}" placeholder="Ingrese un area" required autofocus>
                              </div>
                                @if ($errors->has('areas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('areas') }}</strong>
                                    </span>
                                @endif
                            </div>
                          <div class="form-group col-md-4">
                                <label for="tipo">Tipo contrato</label>
                               <div class="input-group">    
                                <input type="text" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" id="tipo" name="tipo" maxlength="45" value="{{ old('tipo') }}" placeholder="Ingrese un tipo" required autofocus>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                                
                                   <div class="input-group-append">
                                        <span class="input-group-text" data-toggle="tooltip"
                          data-placement="right" title="Ejemplo: Contrato, Base"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                    </div>
                                </div>    
                            </div>
                             <div class="form-group col-md-12">
                                  <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese una descripcion" rows="5" maxlength="255" autofocus required>{{ old('descripcion') }}</textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        
                             
                        <div class="row">
                            <div class="form-group col-md-12" align="right">
                                  <a href="{{ url('/home') }}"  class="btn btn-secondary">Cancelar</a>
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
      placeholder: "Elija una opci贸n",
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
