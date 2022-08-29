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
                <div class="card-header">{{ __('Editar Estudiante de') }} <span id="nombre-uni"></span></div>

                <div class="card-body">
                    <form action="/university/students/{{encrypt($estudiante->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="university_id" value="{{@Auth::user()->university->university_id}}">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="matricula">Matrícula</label>
                                <input type="text" class="form-control" id="matricula" name="enrollment" maxlength="60" value="{{$estudiante->enrollment}}" placeholder="Ingrese una matricula" required autofocus>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="60" value="{{$usuario->name}}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_paterno">Apellido Paterno</label>
                                <input type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" id="apellido_paterno" name="apellido_paterno" maxlength="45" value="{{$usuario->f_surname}}" placeholder="Ingrese un apellido paterno" required autofocus>
                                @if ($errors->has('apellido_paterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" id="apellido_materno" name="apellido_materno" maxlength="45" value="{{$usuario->s_surname}}" placeholder="Ingrese un apellido materno" required autofocus>
                                @if ($errors->has('apellido_materno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" id="telefono" name="telefono" maxlength="20" value="{{$usuario->phone}}" placeholder="Ingrese un teléfono" required autofocus>
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email_escolar">Email Escolar</label>
                                <input type="text" class="form-control{{ $errors->has('email_escolar') ? ' is-invalid' : '' }}" id="email_escolar" name="email_escolar" maxlength="100" value="{{$usuario->email}}" placeholder="Ingrese un email" required autofocus autocomplete="email">
                                @if ($errors->has('email_escolar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_escolar') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estatus">Estatus</label>
                                <select name="estatus" id="estatus" class="form-control" required autofocus>
                                <option value="{{$estudiante->status}}" selected>{{$estudiante->status}}</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Egresado">Egresado</option>
                                </select>
                            </div>
                       
                            <div class="form-group col-md-12" align="center">
                                @if ($errors->any())
                                    @if ($errors->first('programa'))
                                    <li class="alert alert-danger">{{ $errors->first('programa') }}</li>
                                    @endif
                                @endif
                            </div>

                           <div class="col-md" align="center">
                                <label for="programa">Unidad académica</label>
                                <div id="dynamic_field">
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <select name="unidad" id="unidad" class="form-control" onchange="Unique(this,'+i+');" style="width: 100%; height: 40px;" required autofocus>
                                                <option id="v1" value="{{$estudiante->university_id}}">{{$estudiante->university_id}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    
                            <div class="col-md-12" align="center">
                                <label for="programa">Programa</label>
                                <div id="dynamic_field">
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <select name="programa" id="programa" class="form-control" style="width: 100%; height: 40px;" required autofocus>
                                            <option id="p1" values="{{$estudiante->program_id}}">{{$estudiante->program_id}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" align="right">
                                <input class="btn btn-primary" type="submit" value="Actualizar">
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
        

         $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_universidad, async function(data){
                $("#nombre-uni").html(data[0].Nombre);
                clave_ct=data[0].Clave_CT;
            });

//-------------Unidad académica-------------------------------------
          $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllEscSubId/'+id_universidad, async function(data){
                       var modalidades;         
                                //-------------Modalidades académica-------------------------------------
                        await  $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetAllModalida', function(data){
                              modalidades=data;
                              
                            });
                
                 for(var i=0;i<data.length;i++){
                        var cadena='<option alt="'+data[i].Modalidad+'" value="'+data[i].Id_Escuela+'">'+data[i].Nombre;
                            for(j=0;j<modalidades.length;j++){
                                if(modalidades[j].Id_Modalidad==data[i].Modalidad){
                                    cadena=cadena+' '+modalidades[j].Nombre;
                                }
                            }
                            
                            cadena=cadena+'</option>';
                        
                        $("#unidad").append(cadena);
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
            var id_escuela=$("#unidad").children().eq(0).val();
 
 $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllOfertaEscIdSub/'+id_escuela, function(data){
                 for(var i=0;i<data.length;i++){
                        $("#programa").append('<option value="'+data[i].Id_Oferta+'">'+data[i].Nombre_Carrera+'</option>');
                 }  
            });           
            
            
            var id_p=$("#programa").children().eq(0).val();
            
              $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdOferta/'+id_p, function(data){
                        $("#p1").val(data[0].Id_Oferta);
                        $("#p1").text(data[0].Nombre_Carrera);
            });
        
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdEscuelas/'+id_escuela,async function(data){
                         var modalidades;         
                                //-------------Modalidades académica-------------------------------------
                       await  $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetAllModalida', function(data){
                              modalidades=data;
                            });
                        
                        $("#v1").val(data[0].Id_Escuela);
                        
                        for(j=0;j<modalidades.length;j++){
                                if(modalidades[j].Id_Modalidad==data[0].Modalidad){
                                    $("#v1").text(data[0].Nombre +' '+modalidades[j].Nombre);
                                }
                            }
            });
      


        $("#telefono").inputmask({"mask": "999-999-99-99"});

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

        var i = 1;
        
        
});
</script>
@endsection
