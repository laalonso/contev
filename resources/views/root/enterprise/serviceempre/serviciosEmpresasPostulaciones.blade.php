@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/enterprise/services/">Servicios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Universidades postuladas al servicio</li>
                </ol>
            </nav>
            <div class="card">
             <!--   <div class="card-header">SERVICIO: {{$servicio->name}} <br> DESCRIPCIÓN: {{$servicio->description}}</div>-->
                <input type="text" name="buscar" id="buscar-uni" placeholder="BUSCAR">
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h2>LISTA DE UNIVERSIDADES INTERESDAS EN EL SERVICIO</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Universidad</th>

                                <!---
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>-->
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                                     <tbody id="tabla-encargados">
                            <!-- {{$i = 1}} -->

 
@foreach($servicio->university as $universitieS)
    @php
                                    $universidad=App\University::find($universitieS->university_id);
    @endphp
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td><div class="" id="universidad-nombre">{{$universitieS->university_id}}</div></td> 
                                <!---
                                <td>{{$universitieS->user->phone}}</td>
                                <td>{{$universitieS->user->email}} </td> -->
                                <td><?php  echo "Pendiente"; ?></td>
                            </tr>
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
    
            
        $.each($("#tabla-encargados tr"), function(index) {
        var university_id=$(this).find("#universidad-nombre").text();
        var id="university_id"+index;
        $(this).find("#universidad-nombre").attr('id',id);

        if(!isNaN(university_id)){
        
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+university_id, function(data){
                    $("#tabla-encargados tr").find("#"+id).html(data[0].Nombre);
             });   
        }else{
            $(this).attr("class","table-danger");
        }

        });
           
    });

  $("#buscar-uni").keyup(function(){
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
