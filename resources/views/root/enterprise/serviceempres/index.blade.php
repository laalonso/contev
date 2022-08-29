@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Servicios</li>
                </ol>
            </nav>
       <div class="card">
                <div class="card-header">{{ __('Servicios de la empresa') }}</div>
                    <input type="text" name="buscar" id="buscar-ser" placeholder="BUSCAR">
                <div class="card-body">
                <a href="{{ url('/enterprise/servicess/create') }}" class="btn btn-success" role="botton">Añadir</a><br><br>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
             <div class="alert alert-primary" role="alert">
                                      <label for="tipo">Selecione el tipo de oferta que desee añadir</label>
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
                    
<div id="capacitacion" style="display: none;">  
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               
                                  <th scope="col">Tipo</th>
                                <th scope="col">Duración</th>
                                <th scope="col">horas</th>
                                 <th scope="col">Modalidad</th>
                                <th scope="col">Dirigido</th>
                                <th scope="col">Precio</th
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                               
                                   <td>{{ $info->type_training}}</td> 
                                 <td>{{ $info->duration}}</td>
                                   <td>{{ $info->hour}}</td>
                                   <td>{{ $info->modality}}</td>
                                   <td>{{ $info->managed}}</td>
                                   <td>{{ $info->price}}</td>
                                    <td>
                                  
                                </td>
                                <td>
                                    <a href="{{ url('/enterprise/services/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/enterprise/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>   
     <div id="maquinaria" style="display: none;">          
  <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                  <th scope="col">Tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                 <th scope="col">Función</th>
                                <th scope="col">Datos Tecnicos</th>
                                <th scope="col">Dimenciones</th>
                                <th scope="col">Modalidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Detalles</th
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                
                                   <td>{{ $info->type_machinery}}</td> 
                                 <td>{{ $info->brand}}</td>
                                   <td>{{ $info->model}}</td>
                                   <td>{{ $info->functionality}}</td>
                                   <td>{{ $info->technical_data}}</td>
                                   <td>{{ $info->dimensions}}</td>
                                    <td>{{ $info->modality_maquinary}}</td>
                                     <td>{{ $info->price_machinery}}</td>
                                      <td>{{ $info->details}}</td>
                                    <td>
                                  
                                </td>
                                <td>
                                    <a href="{{ url('/enterprise/services/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/enterprise/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>   
             <div id="certificacion" style="display: none;">      
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Tipo</th>
                                <th scope="col">Examen</th>
                                <th scope="col">Duración</th>
                                 <th scope="col">Lugar</th>
                                <th scope="col">Institución</th>
                                <th scope="col">Area de estudio</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Detalles</th
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                   <td>{{ $info->type_certification}}</td> 
                                 <td>{{ $info->exam}}</td>
                                   <td>{{ $info->duration_exam}}</td>
                                   <td>{{ $info->place}}</td>
                                   <td>{{ $info->institution}}</td>
                                    <td>{{ $info->study_area}}</td>
                                     <td>{{ $info->price_certification}}</td>
                                      <td>{{ $info->details_certification}}</td>
                                    <td>
                                  
                                </td>
                                <td>
                                    <a href="{{ url('/enterprise/services/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/enterprise/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>   
                    
                    
                     <div id="laboratorio" style="display: none;">  
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Tipo</th>
                                <th scope="col">Analisis</th>
                                <th scope="col">Estudios o pruebas realizadas</th>
                                 <th scope="col">Detalles</th>
                                
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                   <td>{{ $info->type_laboratory}}</td> 
                                 <td>{{ $info->analysis_type}}</td>
                                   <td>{{ $info->tests_performed}}</td>
                                   <td>{{ $info->details_laboratory}}</td>
                                  
                                    <td>
                                  
                                </td>
                                <td>
                                    <a href="{{ url('/enterprise/services/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/enterprise/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    </div>
                      <div id="otro" style="display: none;">  
                      <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Tipo</th>
                                <th scope="col">Detalles</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody  id="tabla-servi">
                            <!-- {{$i = 1}} -->
                            @foreach($all as $info)
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                   <td>{{ $info->type_other}}</td> 
                                 <td>{{ $info->other}}</td>
                                   
                                  
                                    <td>
                                  
                                </td>
                                <td>
                                    <a href="{{ url('/enterprise/services/'.encrypt($info->id).'/edit') }}" class="btn btn-warning" role="button">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('/enterprise/services/'.encrypt($info->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
</div>
@endsection

@section('js')
<script type="text/javascript">
  $("#buscar-ser").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-servi tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
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