@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Instituciones</li>
              </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('INSTITUCIONES REGISTRADAS') }}</div>
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
                    <table id="tb-instituciones" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Institución</th>
                                <th scope="col">Gestor</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tabla-uni">
                            @foreach($instituciones as $institucion)
                                @php
                                    $user=App\User::find($institucion->user_id);
                                    if($user){
                                        $nombre=$user->name." ".$user->f_surname." ".$user->s_surname;
                                        $telefono=$user->phone;
                                        $email=$user->email;
                                    }else{
                                        $nombre="Sin asignar ";
                                        $telefono="Sin asignar ";
                                        $email="Sin asignar ";
                                    }
                                @endphp
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td class="institucion_id" id="{{$institucion->university_id}}"><div class="spinner"></div></td>
                                    <td>{{$nombre}}</td>
                                    <td>{{$telefono}}</td>
                                    <td>{{$email}}</td>
                                    <td>
                                        <div class='dropdown'>
                                            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-expanded='false'>Información</button>
                                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                                <a class='dropdown-item' target='_blank' href='/root/university/students/list/{{encrypt($institucion->university_id)}}'>Estudiantes</a>
                                                <a class='dropdown-item' target='_blank' href='/root/university/projects/list/{{encrypt($institucion->university_id)}}'>Proyectos</a>
                                                <a class='dropdown-item' target='_blank' href='/root/university/services/list/{{encrypt($institucion->university_id)}}'>Servicios</a>
                                            </div>
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
<script>
    $(document).ready(function(){
    	$('#tb-instituciones').DataTable({
        "order": [],
        language: {
                url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
            }
       });

        $(".institucion_id").each(function (){
            var id=$(this).attr("id");
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id, function(data){
                $("#"+id).text(data[0].Nombre);
            });
        });
        
        $("#buscar-uni").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tb-instituciones tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
    });
</script>

@endsection