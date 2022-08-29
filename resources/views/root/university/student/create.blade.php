@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Estudiante</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('Crear Estudiante en ') }} <span id="nombre-uni"></span></div>

                <div class="card-body">
                    <form action="{{ url('/university/students') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="university_id" value="{{@Auth::user()->university->university_id}}">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="matricula">Matrícula</label>
                                <input type="text" class="form-control" id="matricula" name="enrollment" maxlength="60" value="{{ old('matricula') }}" placeholder="Ingrese una matricula" required autofocus>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="60" value="{{ old('nombre') }}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_paterno">Apellido Paterno</label>
                                <input type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" id="apellido_paterno" name="apellido_paterno" maxlength="45" value="{{ old('apellido_paterno') }}" placeholder="Ingrese un apellido paterno" required autofocus>
                                @if ($errors->has('apellido_paterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" id="apellido_materno" name="apellido_materno" maxlength="45" value="{{ old('apellido_materno') }}" placeholder="Ingrese un apellido materno" required autofocus>
                                @if ($errors->has('apellido_materno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" id="telefono" name="telefono" maxlength="20" value="{{ old('telefono') }}" placeholder="Ingrese un teléfono" required autofocus>
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email_escolar">Email Escolar</label>
                                <input type="text" class="form-control{{ $errors->has('email_escolar') ? ' is-invalid' : '' }}" id="email_escolar" name="email_escolar" maxlength="100" value="{{ old('email_escolar') }}" placeholder="Ingrese un email" required autofocus autocomplete="email">
                                @if ($errors->has('email_escolar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_escolar') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">Contraseña</label>
                                <input type="text" class="form-control" id="password" name="password" maxlength="20" required autofocus>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estatus">Estatus</label>
                                <div class="drop-menu">
                                    <select name="estatus" id="estatus" class="form-control" required autofocus>
                                        <option value="" selected>Elija una opción</option>
                                        <option value="Estudiante">Estudiante</option>
                                        <option value="Egresado">Egresado</option>
                                    </select>
                                </div>                                   
                            </div>
                            <div class="form-group col-md-4">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" id="imagen" name="imagen" accept="image/*" value="{{ old('imagen') }}" required autofocus>
                                @if ($errors->has('imagen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('imagen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" align="center">
                                @if ($errors->any())
                                    @if ($errors->first('programa'))
                                    <li class="alert alert-danger">{{ $errors->first('programa') }}</li>
                                    @endif
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="programa">Modalidad</label>
                                <div id="dynamic_field">
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <select name="modalidad" id="modalidad" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                                            <option value=0>Seleccione una modalidad</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="programa">Unidad académica</label>
                                <div id="dynamic_field">
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <select name="unidad" id="unidad" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                                            <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    
                            <div class="col-md-12">
                                <label for="programa">Programa</label>
                                <div id="dynamic_field">
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <select name="programa" id="programa" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                                            <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" align="right">
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

@section('js')
<script>
    $(document).ready(function() {
        var id_universidad=$("#university_id").val();
        var clave_ct="";

         $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_universidad, function(data){
                $("#nombre-uni").html(data[0].Nombre);
                clave_ct=data[0].Clave_CT;
            });
//-------------Modalidades académica-------------------------------------
          $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetAllModalida', function(data){
                 for(var i=0;i<data.length;i++){
                        $("#modalidad").append('<option value="'+data[i].Id_Modalidad+'">'+data[i].Nombre+'</option>');
                 }  
            });
//-------------Unidad académica-------------------------------------
          $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllEscSubId/'+id_universidad, function(data){
                 for(var i=0;i<data.length;i++){
                        $("#unidad").append('<option alt="'+data[i].Modalidad+'" value="'+data[i].Id_Escuela+'">'+data[i].Nombre+'</option>');
                 }  
            });

              $("#modalidad").change(function(){
                    var id_modalidad=$(this).val();
                    $("#unidad").children().each(function(){
                        if(id_modalidad!=$(this).attr("alt")){
                            $(this).addClass("d-none");
                        }else{
                            $(this).removeClass("d-none");
                        }
                    });
              });
//------------Programa--------------------------------------------
        $("#unidad").change(function(){
            var id_escuela=$(this).val();

            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllOfertaEscIdSub/'+id_escuela, function(data){
                 for(var i=0;i<data.length;i++){
                        $("#programa").append('<option value="'+data[i].Id_Oferta+'">'+data[i].Nombre_Carrera+'</option>');
                 }  
            });
        });


        $("#telefono").inputmask({"mask": "(+52) 999-999-99-99"});

        $("#email_escolar").inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function (pastedValue, opts) {
            pastedValue = pastedValue.toLowerCase();
            return pastedValue.replace("mailto:", "");
        },
        definitions: {
            '*': {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
            cardinality: 1,
            casing: "lower"
            }
        }});

        $('#programa').select2({
            language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
            },
            placeholder: "Elija una opción",
        }).width("100%");

        var i = 1;
        
        
});
</script>
@endsection
