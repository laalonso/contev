@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Crear empresa') }}</div>

                <div class="card-body">
                    <form action="{{ url('/root/enterprise/all') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre de la empresa</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="200" value="{{ old('nombre') }}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
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
                                <label for="email">Email</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" maxlength="100" value="{{ old('email') }}" placeholder="Ingrese un email" required autofocus autocomplete="email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>  
                            <div class="row">
                    <div class="col-5">
                        <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
                    </div>
                    <div class="col-5">
                        <input type="hidden" class="form-control" placeholder="lng" name="lng" id="lng">
                    </div>
                </div>
                <label for="map">Dirección geolocalización</label>
                <div id="map" style="height:400px; width: 1100px;" class="my-3"></div> 
   
                            <div class='row'>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="estado">Entidad</label>
                                <select name="estado" class="form-control state" id="estado" required autofocus style="width:100%; height: 38px;">
                                    <option value="">Elija una opción</option>
                                    @foreach ($state as $item1)
                                    <option value="{{ $item1->id }}">{{ $item1->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="municipio">Influencia municipal</label>
                                <select name="municipio" class="form-control municipality" id="municipio" required autofocus style="width:100%; height: 38px;">
                                   <option></option>
                                </select>
                            </div>
                         <!--   
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="localidad">Localidad</label>
                                <select name="localidad" class="form-control location" id="localidad" required autofocus style="width:100%; height: 38px;">
                                    <option></option>
                                </select>

                            </div>
                           -->  
                      </div>
 

                           <div class="row"> 
                                <div class="form-group col-md-4">
                                    <label for="enlace">Sitio web</label>
                                    <input type="text" class="form-control{{ $errors->has('enlace') ? ' is-invalid' : '' }}" id="enlace" name="enlace" maxlength="200" value="{{ old('enlace') }}" placeholder="Ingrese el link de su pagina web" required autofocus>
                                    @if ($errors->has('enlace'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('enlace') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="compra">Principales compras</label>
                                    <input type="text" class="form-control{{ $errors->has('compra') ? ' is-invalid' : '' }}" id="compra" name="compra" maxlength="200" value="{{ old('compra') }}" placeholder="Ingrese un compra" required autofocus>
                                    @if ($errors->has('compra'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('compra') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                 
                             </div>
                             
                             <div class="row my-0">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sector">Sector</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="subsector">Subsector</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                    </div>
                                </div>
                             </div>
                             
                             <div id="sector-subsector" class="my-0">
                                 <div class="row sectores my-2">
                                    <div class="col">                                   
                                        <select class="form-control sector" id="sector">
                                            <option value="{{encrypt(0)}}">Selecciona un sector</option>
                                        @foreach($sectores as $sector)
                                            <option value="{{encrypt($sector->id)}}">{{$sector->sector}}</option>
                                        @endforeach
                                        
                                        </select>
                                    </div>
                                    <div class="col">                                    
                                        <select class="form-control subsector" id="subsector">                                       
                                          
                                        </select>
                                    </div>
                                    <div class="col">                                    
                                        <select class="form-control descripcion" id="descripcion">           
                                          
                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger eliminar">Eliminar</button>
                                    </div>
                                 </div>
                            </div>
                             <div class="row my-4">
                                <div class="col">
                                    <button type="button" id="agregar-sector" class="btn btn-primary">Agregar Sector</button>
                                </div>
                             </div>                             

                                <div class="form-group col-md-4">
                                  <label for="archivo_fiscal">Constancia de situación fiscal </label>
                                <input type="file" class="form-control{{ $errors->has('archivo_fiscal') ? ' is-invalid' : '' }}" id="archivo_fiscal" name="archivo_fiscal" accept="application/pdf" value="{{ old('archivo_fiscal') }}" required autofocus>
                                 @if ($errors->has('archivo_fiscal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('archivo_fiscal') }}</strong>
                                    </span>
                                @endif
                            </div>



                             </div>   
                        

                             <div class="row">
                             <div class="form-group col-md-12">
                                <label for="description">Descripción</label>
                                <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="Ingrese una descripción de la empresa" rows="5" maxlength="500" autofocus required>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                         
                        <div class="row">
                            <div class="form-group col-md-12">
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
                            <div class="form-group col-md-12" align="right">
                                
                                   <a  href="{{ url('/root/enterprise/all') }}" class="btn btn-secondary" >Cancelar</a>
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
$( document ).ready(function() {    
    $("#sector-subsector").on('click','.eliminar',function(){
       var nsectores=$(".sectores").length;
       if(nsectores>1){
        $(this).parent().parent().remove();
       }
    });
    $("#agregar-sector").click(function(){
        var sectorAux=$(".sectores").eq(0).clone();
        $(".sectores").last().after(sectorAux);
    });
    $("#sector-subsector").on('change','.sector',function(){
        var sector_id=$(this).val();
        var campo=$(this);
        $.get( "/root/getSubsectores/"+sector_id, function( data ) {
            campo.parent().parent().find(".subsector").html('<option>Selecciona un Subsector</option>');
            campo.parent().parent().find(".descripcion").html('<option>Selecciona una Descripción</option>');
            data.forEach(function (dato){
                campo.parent().parent().find(".subsector").append('<option value="'+dato.id+'">'+dato.subsector+'</option>');
            });
        });
    });
    $("#sector-subsector").on('change','.subsector',function(){
        var subsector_id=$(this).val();
        var campo=$(this);
        $.get( "/root/getDescripciones/"+subsector_id, function(data) {
            campo.parent().parent().find(".descripcion").html('<option>Selecciona una Descripción</option>');
            data.forEach(function (dato){
                campo.parent().parent().find(".descripcion").append('<option value="'+dato.id+'">'+dato.descripcion+'</option>');
            });
        });
    });
    
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
      placeholder: "Elija una opción",
    });
});
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
<script>
    $(document).ready(function() {
        $('.state').select2({
            language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
                  },
        }).width("100%");

        $('.municipality').select2({
            language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
            },
        }).width("100%");

       /* $('.location').select2({
            language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
            },
        }).width("100%");*/

        $('#estado').on('change', function() {
        $('#localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
			$("#estado option:selected").each(function () {
			state = $(this).val();
            $.ajax({
      				url: "/root/addressenterprise/viewmunicipalities",
      				method: "GET",
      				data: {'state':state},
                    success:function(data){
                        $("#municipio").html(data);
                    }
                });
            });
        });

        $("#municipio").change(function () {
            $("#municipio option:selected").each(function () {
                municipio = $(this).val();
                $.ajax({
      				url: "/root/addressenterprise/viewlocations",
      				method: "GET",
      				data: {'municipio':municipio},
                    success:function(data){
                        $("#localidad").html(data);
                    }
                });       
            });
        });
    });
</script>
<script>
                    let map;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: { lat: 19.1789157, lng: -96.2463573 },
                            zoom: 8,
                            scrollwheel: true,
                        });
                        const uluru = { lat: -96.2463573, lng: 19.1789157 };
                        let marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            draggable: true
                        });
                        google.maps.event.addListener(marker,'position_changed',
                            function (){
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })
                        google.maps.event.addListener(map,'click',
                        function (event){
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                    }
                </script>
                 <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"

                 
                        type="text/javascript"></script>
@endsection
