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

            <h2 class="d-none" id="universidad-nombre">{{$id_universidad}}</h2>
            <div class="card">
                <div class="card-header">{{ __('Crear Servicio') }}</div>

                <div class="card-body">
                     <div class="alert alert-primary" role="alert">
                                      <label for="oferta">Tipo de servicio</label>
                                        <select id="oferta" name="oferta" class="custom-select" onChange="mostrar(this.value);">
                                            
                                        <!--  <option selected>Tipo de servicio</option>-->
                                          <option value="" selected>Elija una opción</option>
                                          <option value="capacitacion">Capacitación</option>
                                          <option value="certificacion">Certificación</option>
                                          <option value="laboratorio">Laboratorio</option>
                                          <option value="otro">otro</option>
                                        </select>                
                                  </div>
               <!--Inicio de primer formulario-->                       
         <div id="capacitacion" style="display: none;">                          
                <div class="card-body">
                    <form action="/university/services" method="POST">
                      @csrf
                            <div class="alert alert-primary" role="alert">   
                                <label>LLene los datos de la capacitación </label>
                             </div>
                             
                             <input type="hidden" id="tipo" name="oferta"value="Capacitacion">
                             
                             
                        <div class="row">
                          <div class="form-group col-md-4">
                                 <label for="duracion">Duración</label>
                                  <input type="text" class="form-control {{ $errors->has('duracion') ? ' is-invalid' : '' }}" id="duracion" name="duracion" maxlength="200" value="{{ old('duracion') }}" placeholder="Ingrese una duración"  >
                                @if ($errors->has('duracion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duracion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="form-group col-md-4">
                                <label for="hora">Hora</label>
                                <input type="text" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" id="hora" name="hora" maxlength="200" value="{{ old('hora') }}" placeholder="Ingrese un hora"  >
                              </div>
                                @if ($errors->has('hora'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora') }}</strong>
                                    </span>
                                @endif
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
                                <input type="text" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" id="precio" name="precio" maxlength="200" value="{{ old('precio') }}" placeholder="Ingrese costo"  >
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
                    <form action="/university/services" method="POST">
                      @csrf
                      <div class="alert alert-primary" role="alert">     
                                <label>LLene los campos del servicio de maquinaria</label>
                        </div>   
                         <input type="hidden" id="tipo" name="oferta"  value="Maquinaria">
                        
                         <div class="row">    
                          <div class="form-group col-md-6">
                                 <label for="marca">Marca</label>
                                  
                                <input type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" id="marca" name="marca" maxlength="200" value="{{ old('marca') }}" placeholder="Ingrese una marca" required autofocus>
                               
                                @if ($errors->has('marca'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marca') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="modelo">Modelo</label>
                                
                                <input type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" id="modelo" name="modelo" maxlength="200" value="{{ old('modelo') }}" placeholder="Ingrese un modelo" required autofocus>
                              
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
                               
                                <input type="text" class="form-control{{ $errors->has('principal') ? ' is-invalid' : '' }}" id="principal" name="principal" maxlength="200" value="{{ old('principal') }}" placeholder="Ingrese un funcion principal" required autofocus>
                              
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
                                
                                <input type="text" class="form-control{{ $errors->has('tecnicos') ? ' is-invalid' : '' }}" id="tecnicos" name="tecnicos" maxlength="200" value="{{ old('tecnicos') }}" placeholder="Ingrese datos tecnicos" required autofocus>
                              
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
                                
                                <input type="text" class="form-control{{ $errors->has('dimenciones') ? ' is-invalid' : '' }}" id="dimenciones" name="dimenciones" maxlength="200" value="{{ old('dimenciones') }}" placeholder="Ingrese las dimenciones" required autofocus>
                              
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
                                
                                <input type="text" class="form-control{{ $errors->has('precio_maquinaria') ? ' is-invalid' : '' }}" id="precio_maquinaria" name="precio_maquinaria" maxlength="200" value="{{ old('precio_maquinaria') }}" placeholder="Ingrese costo" required autofocus>
                              
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
                    <form action="/university/services" method="POST">
                      @csrf
                       <div class="alert alert-primary" role="alert">
                                <label>LLene los campos del servicio de certificación</label>
                                </div>     
                         
                          <input type="hidden" id="tipo" name="oferta"value="Certificacion">
                        <div class="row">
                                <div class="form-group col-md-4">
                                      <label for="examen">Examen</label>
                                    <select id="examen" name="examen" class="custom-select">
                                                <option selected>Elija opcion</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                              </select>  
                                  </div>
                         
                         
                         
                            <div class="form-group col-md-4">
                                <label for="duracion_examen">Duración</label>
                               
                                <input type="text" class="form-control{{ $errors->has('duracion_examen') ? ' is-invalid' : '' }}" id="duracion_examen" name="duracion_examen" maxlength="200" value="{{ old('duracion_examen') }}" placeholder="Ingrese una duracion" required autofocus>
                             
                                @if ($errors->has('duracion_examen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duracion_examen') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="lugar">Lugar</label>
                                
                                <input type="text" class="form-control{{ $errors->has('lugar') ? ' is-invalid' : '' }}" id="lugar" name="lugar" maxlength="200" value="{{ old('lugar') }}" placeholder="Ingrese un lugar" required autofocus>
                              
                                @if ($errors->has('lugar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lugar') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                            
                            </div>
                            
                            <div class="row">
                                <div class="form-group col">
                                <label for="institucion">Nombre de la Certificación</label>
                                
                                <input type="text" class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="200" value="{{ old('institucion') }}" placeholder="Ingrese el nombre de la certificadora" required autofocus>
                             
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
                                
                                <input type="text" class="form-control{{ $errors->has('precio_certificacion') ? ' is-invalid' : '' }}" id="precio_certificacion" name="precio_certificacion" maxlength="200" value="{{ old('precio_certificacion') }}" placeholder="Ingrese un costo" required autofocus>
                              
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
                    <form action="/university/services" method="POST">
                      @csrf
                       <div class="alert alert-primary" role="alert">
                                 <label>LLene los campos del servicio de laboratorio</label>
                                </div>   
                                 <input type="hidden" id="oferta" name="oferta"value="Laboratorio">
                         <div class="row">
                           <div class="form-group col-md-6">
                                <label for="tipo">Tipo </label>
                              <select id="tipo" name="tipo" class="custom-select">
                                          <option selected>Elija tipo</option>
                                          <option value="MAQUINARIA INDUSTRIAL">MAQUINARIA INDUSTRIAL</option>
                                          <option value="QUÍMICA Y FÍSICA">QUÍMICA Y FÍSICA</option>
                                          <option value="AGROBIOTECNOLOGIA O BIOANÁLISIS">AGROBIOTECNOLOGIA O BIOANÁLISIS</option>
                                          <option value="DESARROLLO DE SOFTWARE">DESARROLLO DE SOFTWARE</option>
                                          <option value="INGENIERÍA FORESTAL/INVERNADEROS">INGENIERÍA FORESTAL/INVERNADEROS</option>
                                          <option value="ÁREA EXPERIMENTAL/INNOVACIÓN AGRÍCOLA">ÁREA EXPERIMENTAL/INNOVACIÓN AGRÍCOLA</option>
                                          <option value="FABRICACIÓN 3D/REALIDAD VIRTUAL">FABRICACIÓN 3D/REALIDAD VIRTUAL</option>
                                          <option value="ALIMENTOS/PROCESOS ALIMENTARIOS">ALIMENTOS/PROCESOS ALIMENTARIOS</option>
                                          <option value="MAQUINADO (PIEZAS METÁLICAS)">MAQUINADO (PIEZAS METÁLICAS)</option>
                                        </select>  
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="pruebas_realizadas">Nombre del Laboratorio</label>
                                  <div class="form-group">
                                      <input type="text" class="form-control{{ $errors->has('pruebas_realizadas') ? ' is-invalid' : '' }} form-control-sm" id="pruebas_realizadas" name="nombre" maxlength="200" value="" placeholder="Ingrese el nombre" required autofocus>
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
                                  <label for="detalles_laboratorio">Descripción General</label>
                                <textarea name="detalles_laboratorio" class="form-control{{ $errors->has('detalles_laboratorio') ? ' is-invalid' : '' }}" id="detalles_laboratorio" placeholder="Principales características y funcionalidades del laboratorio (máxima 500 caracteres)" rows="5" maxlength="500" autofocus required>{{ old('detalles_laboratorio') }}</textarea>
                                @if ($errors->has('detalles_laboratorio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detalles_laboratorio') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                       
                          
                        <div class="row">
                            <div class="form-group col-md-12 p-2" align="right">
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
                    <form action="/university/services" method="POST">
                      @csrf
                       <div class="alert alert-primary" role="alert">
                                
                                <label>Otro: Especifique las características de su servicio</label>
                                </div> 
                                
                         
                            <input type="hidden" id="tipo" name="oferta"value="Otro">
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
<script>
    $(document).ready(function() {
        var id_universidad=$("#universidad-nombre").text();

         $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_universidad, function(data){
                $("#universidad-nombre").html(data[0].Nombre);
                $("#universidad-nombre").removeClass("d-none");
                $("#universidad-nombre").addClass("d-block");
            });
            
          
    });
</script>
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
