@extends('layouts.app')

@section('content')
<div class="container">
    <script src='jquery-2.1.4.min.js'></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
                
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Servicio</li>
                </ol>
            </nav>
                 
                
                    
                 <div class="d-none">{{$id_empresa}}</div>
            <div class="card">
                <div class="card-header">
                    
                      @foreach($all as $in)
               <h2 >{{ __('Servicios empresa') }}  {{ $in->enterprise->name}}</h2> 
                    @endforeach
                    
                </div>

 
                            <div class="alert alert-primary" role="alert">
                                      <label for="tipo">Tipo de servicio</label>
                                        <select id="tipo" name="tipo" class="custom-select" onChange="mostrar(this.value);">
                                            
                                        <!--  <option selected>Tipo de servicio</option>-->
                                          <option value="" selected>Elija una opción</option>
                                          <option value="capacitacion">Capacitación</option>
                                          <option value="maquinaria">Maquinaria</option>
                                          <option value="certificacion">Certificación</option>
                                          <option value="laboratorio">Laboratorio</option>
                                          <option value="otro">otro</option>
                                        </select>                
                                  </div>
               <!--Inicio de primer formulario-->                       
         <div id="capacitacion" style="display: none;">                          
                <div class="card-body">
                    <form action="/enterprise/servicess" method="POST">
                      @csrf
                            <div class="alert alert-primary" role="alert">   
                                <label>LLene los datos de la capacitación </label>
                             </div>
                             
                             <input type="hidden" id="tipo_capacitacion" name="tipo_capacitacion"value="Capacitacion">
                             
                             
                        <div class="row">
                          <div class="form-group col-md-4">
                                 <label for="duracion">Duración</label>
                                   <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('duracion') ? ' is-invalid' : '' }}" id="duracion" name="duracion" maxlength="200" value="{{ old('duracion') }}" placeholder="Ingrese una duraci"  >
                               </div>
                                @if ($errors->has('duracion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duracion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="form-group col-md-4">
                                <label for="hora">Hora</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" id="hora" name="hora" maxlength="200" value="{{ old('hora') }}" placeholder="Ingrese un hora"  >
                              </div>
                                @if ($errors->has('hora'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="modalidad">Modalidad</label>
                              <select id="modalidad" name="modalidad" class="custom-select">
                                          <option selected>Tipo de modalidad</option>
                                          <option value="Presencial">Presencial</option>
                                          <option value="Virtual">Virtual</option>
                                          <option value="Ambas">Ambas</option>          
                                </select>  
                            </div>
                            
                       </div>
                      
                            <div class="row">
                                 <div class="form-group col-md-6">
                                 <label for="dirigido">Dirigido</label>
                                     <select id="dirigido" name="dirigido" class="custom-select">
                                          <option selected>Elija quien dirigira</option>
                                          <option value="Estudiantes">Estudiantes</option>
                                          <option value="Docentes">Docentes</option>
                                          <option value="Directivos">Dorectivos</option>
                                          <option value="Todos">Todos</option>
                                        </select>  
                                    </div>
                                    
                              <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" id="precio" name="precio" maxlength="200" value="{{ old('precio') }}" placeholder="Ingrese costo"  >
                              </div>
                                @if ($errors->has('precio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('precio') }}</strong>
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
     
       <!--Fin de prmer formulario-->
       
       
            <!--Inicio de segundo formulario-->                       
         <div id="maquinaria" style="display: none;">                           
                <div class="card-body">
                    <form action="/enterprise/servicess" method="POST">
                      @csrf
                      <div class="alert alert-primary" role="alert">     
                                <label>LLene los campos del servicio de maquinaria</label>
                        </div>   
                         <input type="hidden" id="tipo_maquinaria" name="tipo_maquinaria"  value="Maquinaria">
                        
                         <div class="row">    
                          <div class="form-group col-md-6">
                                 <label for="marca">Marca</label>
                                   <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                <input type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" id="marca" name="marca" maxlength="200" value="{{ old('marca') }}" placeholder="Ingrese una marca" required autofocus>
                               </div>
                                @if ($errors->has('marca'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marca') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="modelo">Modelo</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" id="modelo" name="modelo" maxlength="200" value="{{ old('modelo') }}" placeholder="Ingrese un modelo" required autofocus>
                              </div>
                                @if ($errors->has('modelo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                            <div class="row">   
                            <div class="form-group col-md-12">
                                <label for="principal">Función principal</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('principal') ? ' is-invalid' : '' }}" id="principal" name="principal" maxlength="200" value="{{ old('principal') }}" placeholder="Ingrese un funcion principal" required autofocus>
                              </div>
                                @if ($errors->has('principal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('principal') }}</strong>
                                    </span>
                                @endif
                            </div>
                         
                          
                            </div>
                            <div class="row">
                            <div class="form-group col-md-12">
                                <label for="tecnicos">Datos tecnicos</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('tecnicos') ? ' is-invalid' : '' }}" id="tecnicos" name="tecnicos" maxlength="200" value="{{ old('tecnicos') }}" placeholder="Ingrese datos tecnicos" required autofocus>
                              </div>
                                @if ($errors->has('tecnicos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tecnicos') }}</strong>
                                    </span>
                                @endif
                            </div>
                              
                          
                            
                          </div>


                            <div class="row">
                                  <div class="form-group col-md-4">
                                <label for="dimenciones">Dimensiones</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('dimenciones') ? ' is-invalid' : '' }}" id="dimenciones" name="dimenciones" maxlength="200" value="{{ old('dimenciones') }}" placeholder="Ingrese las dimenciones" required autofocus>
                              </div>
                                @if ($errors->has('dimenciones'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dimenciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                                 <div class="form-group col-md-4">
                                <label for="modalidad_maquinaria">Modalidad</label>
                              <select id="modalidad_maquinaria" name="modalidad_maquinaria" class="custom-select">
                                          <option selected>Elija modalidad</option>
                                          <option value="Renta">Renta</option>
                                          <option value="Venta">Venta</option>
                                        </select>  
                            </div>
                              <div class="form-group col-md-4">
                                <label for="precio_maquinaria">Precio</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('precio_maquinaria') ? ' is-invalid' : '' }}" id="precio_maquinaria" name="precio_maquinaria" maxlength="200" value="{{ old('precio_maquinaria') }}" placeholder="Ingrese costo" required autofocus>
                              </div>
                                @if ($errors->has('precio_maquinaria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('precio_maquinaria') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                           <div class="form-group col-md-12">
                                  <label for="detalles">Detalles</label>
                                <textarea name="detalles" class="form-control{{ $errors->has('detalles') ? ' is-invalid' : '' }}" id="detalles" placeholder="Ingrese una detalles" rows="5" maxlength="255" autofocus required>{{ old('detalles') }}</textarea>
                                @if ($errors->has('detalles'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detalles') }}</strong>
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
     
       <!--Fin de segundo formulario-->
       
          <!--Inicio de tercer formulario-->                       
        <div id="certificacion" style="display: none;">                         
                <div class="card-body">
                    <form action="/enterprise/servicess" method="POST">
                      @csrf
                       <div class="alert alert-primary" role="alert">
                                <label>LLene los campos del servicio de certificación</label>
                                </div>     
                         
                          <input type="hidden" id="tipo_certificacion" name="tipo_certificacion"value="Certificacion">
                        <div class="row">
                                <div class="form-group col-md-3">
                                      <label for="examen">Examen</label>
                                    <select id="examen" name="examen" class="custom-select">
                                                <option selected>Elija opcion</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                              </select>  
                                  </div>
                         
                         
                         
                            <div class="form-group col-md-3">
                                <label for="duracion_examen">Duración</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('duracion_examen') ? ' is-invalid' : '' }}" id="duracion_examen" name="duracion_examen" maxlength="200" value="{{ old('duracion_examen') }}" placeholder="Ingrese una duracion" required autofocus>
                              </div>
                                @if ($errors->has('duracion_examen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duracion_examen') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group col-md-3">
                                <label for="lugar">Lugar</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" id="lugar" name="lugar" maxlength="200" value="{{ old('lugar') }}" placeholder="Ingrese un lugar" required autofocus>
                              </div>
                                @if ($errors->has('lugar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lugar') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group col-md-3">
                                <label for="institucion">Institución</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" id="institucion" name="institucion" maxlength="200" value="{{ old('institucion') }}" placeholder="Ingrese la institucion certificadora" required autofocus>
                              </div>
                                @if ($errors->has('institucion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institucion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            </div>
                           
                             <div class="row">
                                   <div class="form-group col-md-6">
                                <label for="area_estudio">Area de estudio </label>
                              <select id="area_estudio" name="area_estudio" class="custom-select">
                                          <option selected>Elija modalidad</option>
                                          <option value="Administracion">Administración</option>
                                          <option value="Ingenieria">Ingenieria</option>
                                          <option value="Salud">Salud</option>
                                          <option value="Alimentacion">Alimentación</option>
                                          <option value="Sustentabilidad">Sustentabilidad</option>
                                          <option value="Seguridad">Seguridad</option>
                                          <option value="Otro">Otro</option>
                                        </select>  
                            </div>
                              
                              <div class="form-group col-md-6">
                                <label for="precio_certificacion">Precio</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('precio_certificacion') ? ' is-invalid' : '' }}" id="precio_certificacion" name="precio_certificacion" maxlength="200" value="{{ old('precio_certificacion') }}" placeholder="Ingrese un costo" required autofocus>
                              </div>
                                @if ($errors->has('precio_certificacion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('precio_certificacion') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                           <div class="form-group col-md-12">
                                  <label for="detalles_certificacion">Detalles</label>
                                <textarea name="detalles_certificacion" class="form-control{{ $errors->has('detalles_certificacion') ? ' is-invalid' : '' }}" id="detalles_certificacion" placeholder="Ingrese mas detalles" rows="5" maxlength="255" autofocus required>{{ old('detalles_certificacion') }}</textarea>
                                @if ($errors->has('detalles_certificacion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detalles_certificacion') }}</strong>
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
     
       <!--Fin de tercer formulario-->
       
        <!--Inicio de cuarta formulario-->                       
        <div id="laboratorio" style="display: none;">                         
                <div class="card-body">
                    <form action="/enterprise/servicess" method="POST">
                      @csrf
                       <div class="alert alert-primary" role="alert">
                                 <label>LLene los campos del servicio de laboratorio</label>
                                </div>   
                                 <input type="hidden" id="tipo_laboratorio" name="tipo_laboratorio"value="Laboratorio">
                         <div class="row">
                           <div class="form-group col-md-6">
                                <label for="tipo_analisis">Tipo </label>
                              <select id="tipo_analisis" name="tipo_analisis" class="custom-select">
                                          <option selected>Elija tipo</option>
                                          <option value="Analisis y control de calidad">Analisis y control de calidad</option>
                                          <option value="Biosegurdad">Bioseguridad</option>
                                          <option value="Clinicos">Clinicos</option>
                                          <option value="De prieba">De prueba</option>
                                          <option value="De investigacion y desarrollo">De investigacion y desarrolo</option>
                                          <option value="Quimicos">Quimicos</option>
                                          <option value="Fisicos">Fisicos</option>
                                          <option value="Otro">Otro</option>
                                        </select>  
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="pruebas_realizadas">Estudios o pruebas realizadas</label>
                                <div class="input-group">
                                 <div class="input-group-prepend">
                                 </div>
                                <input type="text" class="form-control{{ $errors->has('pruebas_realizadas') ? ' is-invalid' : '' }}" id="pruebas_realizadas" name="pruebas_realizadas" maxlength="200" value="{{ old('pruebas_realizadas') }}" placeholder="Ingrese Estudios o pruebas realizadas" required autofocus>
                              </div>
                                @if ($errors->has('pruebas_realizadas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pruebas_realizadas') }}</strong>
                                    </span>
                                @endif
                            </div>
                             
                            
                            
                            </div>
                           <div class="row">
                            
                           <div class="form-group col-md-12">
                                  <label for="detalles_laboratorio">Detalles</label>
                                <textarea name="detalles_laboratorio" class="form-control{{ $errors->has('detalles_laboratorio') ? ' is-invalid' : '' }}" id="detalles_laboratorio" placeholder="Ingrese mas detalles" rows="5" maxlength="255" autofocus required>{{ old('detalles_laboratorio') }}</textarea>
                                @if ($errors->has('detalles_laboratorio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detalles_laboratorio') }}</strong>
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
     
       <!--Fin de cuarto formulario-->
       
          <!--Inicio de quito formulario-->                       
       <div id="otro" style="display: none;">                         
                <div class="card-body">
                    <form action="/enterprise/servicess" method="POST">
                      @csrf
                       <div class="alert alert-primary" role="alert">
                                
                                <label>Otro: Especifique las características de su servicio</label>
                                </div> 
                                
                         
                            <input type="hidden" id="tipo_otro" name="tipo_otro"value="Otro">
                             <div class="form-group col-md-12">
                                  <label for="otro">Otro</label>
                                <textarea name="otro" class="form-control{{ $errors->has('otro') ? ' is-invalid' : '' }}" id="otro" placeholder="Especifique las características de su servicio, Duración, Función, Precio, etc." rows="5" maxlength="255" autofocus required>{{ old('otro') }}</textarea>
                                @if ($errors->has('otro'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('otro') }}</strong>
                                    </span>
                                @endif
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
     
       <!--Fin de quito formulario-->
       
   </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!--
<script>
    $(document).ready(function(){
       $('#select').on('change',funtion(){
          var selectValor= $(this).val();
          alert (SelectValor);
       }); 
    });
</script>-->
<script type="text/javascript" src="jquery-3.6.0.js"></script>
<script type="text/javascript">
function mostrar(id) {
    if (id == "capacitacion") {
        $("#capacitacion").show();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").hide();
          $("#otro").hide();
    }

  if (id == "maquinaria") {
        $("#capacitacion").hide();
        $("#maquinaria").show();
        $("#certificacion").hide();
        $("#laboratorio").hide();
          $("#otro").hide();
    }

  if (id == "certificacion") {
        $("#capacitacion").hide();
        $("#maquinaria").hide();
        $("#certificacion").show();
        $("#laboratorio").hide();
          $("#otro").hide();
  }
  if (id == "laboratorio") {
        $("#capacitacion").hide();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").show();
          $("#otro").hide();
  }

  if (id == "otro") {
        $("#capacitacion").hide();
        $("#maquinaria").hide();
        $("#certificacion").hide();
        $("#laboratorio").hide();
          $("#otro").show();
      
  }
}
</script>
@endsection
