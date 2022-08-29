@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
               <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de servicios de universidad</li>
              </ol>
            </nav>
            
            <div class="card">
                <div class="card-header">{{ __('LISTA DE SERVICIOS') }}</div>
                <input type="text" name="buscar" id="buscar-servicio" placeholder="BUSCAR">
                
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Universidad</th>
                                <th scope="col">Solicitar</th>
                                
                            </tr>
                        </thead>
                     <tbody id="tabla-encargados">
                            <!-- {{$i = 1}} -->
                 
                    @foreach($servicios as $servicio)
                               
                    @php
                           
                            $empresa_id=Auth::user()->asignar()->first()->id;
                            $postulacion=App\Asignar::find($empresa_id)->universityServices()->where('university_service_id',$servicio->id)->first();
                            
                    @endphp
                    @if(!$postulacion)
                            

                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $servicio->name }}</td>
                                <td>{{ $servicio->type }}</td>
                                <td>{{ $servicio->description }}</td>
                                 <td>
                                      <div class="" id="universidad-nombre">{{$servicio->university_id}}</div>
                                 
                                    </td>
                                  
                                     <td><a class="btn btn-primary" href="/enterprise/universidades/servicios/postular/{{encrypt($servicio->id)}}">Postular</a></td>
                            </tr>
                       
                      @endif
              
                   @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
       //var id_universidad=$("#universidad-nombre").text();
        // $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdEscuelas/'+id_universidad, function(data){
          //      $("#universidad-nombre").html(data[0].Nombre);
           //     $("#universidad-nombre").removeClass("d-none");
            //    $("#universidad-nombre").addClass("d-block");
            //    console.log(id_universidad);
            //});
            
        $.each($("#tabla-encargados tr"), function(index) {
        var university_id=$(this).find("#universidad-nombre").text();
        var id="university_id"+index;
        $(this).find("#universidad-nombre").attr('id',id);

        if(!isNaN(university_id)){
            //https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdEscuelas/
            //https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+university_id, function(data){
                    $("#tabla-encargados tr").find("#"+id).html(data[0].Nombre);
             });   
        }else{
            $(this).attr("class","table-danger");
        }

        });
           
    });
     $("#buscar-servicio").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-encargados tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
              
                 });
                 });
    
    
</script>
@endsection