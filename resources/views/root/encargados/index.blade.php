@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div id="uni-encargado" class="card-header">{{ __('LISTA DE ENCARGADOS ') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <div class="table-responsive">
                    <table id="tb-encargados" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE COMPLETO</th>
                                <th>EMAIL</th>
                                <th>TELÉFONO</th>
                                <th>UNIVERSIDAD</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-encargados">
@foreach($usuarios as $usuario)
                            <tr>
                                <td><div id="indice">{{$loop->index+1}}</div></td>
                                <td>{{$usuario->name}} {{$usuario->f_surname}} {{$usuario->s_surnamer}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->phone}}</td>
                                <td>
                                    <div id="university_id">
@php
                                        if(isset($usuario->university()->first()->university_id)){
                                           echo  $usuario->university()->first()->university_id;
                                        }else{
                                            echo "Sin asignar";
                                        }
@endphp
                                    </div>
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
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
    	$('#tb-encargados').DataTable({
        "order": [],
        language: {
                url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
            }
       });

        $.each($("#tabla-encargados tr"), function(index) {
            var university_id=$(this).find("#university_id").text();
            var id="university_id"+index;
            $(this).find("#university_id").attr('id',id);

            if(!isNaN(university_id)){
                $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+university_id, function(data){
                        $("#tabla-encargados tr").find("#"+id).html(data[0].Nombre);
                 });   
            }else{
                $(this).attr("class","table-danger");
            }

        });
         $("#buscar-encargado").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-encargados tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
    });
</script>

@endsection
