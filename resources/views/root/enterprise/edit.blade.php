@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar empresa') }}</div>

                <div class="card-body">
                    <form action="{{ url('/root/enterprise/all/'.encrypt($all->id).'') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" maxlength="200" value="{{ $all->name }}" placeholder="Ingrese un nombre" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono">Tel茅fono</label>
                                <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" id="telefono" name="telefono" maxlength="20" value="{{ $all->phone }}" placeholder="Ingrese un tel茅fono" required autofocus>
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" maxlength="100" value="{{ $all->email }}" placeholder="Ingrese un email" required autofocus autocomplete="email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                             </div>
                            
                          <!--   <div class="form-group col-md-3">
                                <label for="giro">Giro empresarial</label>
                                <select name="giro" id="giro" class="form-control universidad" required autofocus style="width: 100%; height: 40px;">
                                    <option value="{{ $all->giro }}" >{{ $all->giro }}</option>
                                    @if ($errors->has('giro'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('giro') }}</strong>
                                    </span>
                                      @endif
                                    <option value="Industrial - Extractiva">Industrial - Extractiva</option>
                                    <option value="Industrial - Manufacturera">Industrial - Manufacturera</option>
                                    <option value="Industrial - Agropecuaria">Industrial - Agropecuaria</option>
                                    <option value="Comercial  - Mayorista">Comercial - Mayorista</option>
                                    <option value="Comercial  - Minorista o detallista">Comercial - Minorista o detallista</option>
                                    <option value="Comercial  - Comisionista">Comercial  - Comisionista</option>
                                    <option value="De servicio - Minero">De servicio - Minero</option>
                                    <option value="De servicio - Pesca">De servicio - Pesca</option>
                                    <option value="De servicio - Bienes raíces">De servicio - Bienes raices</option>
                                    <option value="De servicio - Construcción">De servicio - Construccion</option>
                                    <option value="De servicio - Ganadero">De servicio - Ganadero</option>
                                    <option value="De servicio - Transporte aéreo">De servicio - Transporte aereo</option>
                                    <option value="De servicio - Turismo">De servicio - Turismo</option>
                                    <option value="De servicio - Software">De servicio - Software</option>
                                    <option value="De servicio - Telecomunicaciones">De servicio - Telecomunicaciones</option>
                                    <option value="De servicio - Metalurgia">De servicio - Metalurgia</option>
                                    <option value="De servicio - Cinematográfica">De servicio - Cinematografica</option>
                                    <option value="De servicio - Editorial">De servicio - Editorial</option>
                                    <option value="De servicio – Mercados mayoristas">De servicio - Mercados mayoristas</option>
                                    <option value="De servicio – Productores agrícolas">De servicio - Productores agricolas</option>
                                    <option value="De servicio – Empresas de diseño">De servicio - Empresas de diseno</option>
                                    <option value="De servicio - Electricidad">De servicio - Electricidad</option>
                                    <option value="De servicio – Agua potable">De servicio - Agua potable</option>
                                    <option value="De servicio - Cobranzas">De servicio - Cobranzas</option>
                                    <option value="De servicio - Vigilancia">De servicio - Vigilancia</option>
                                    <option value="De servicio - Derecho">De servicio - Derecho</option>
                                </select>
                            </div>
                            -->
                            <div class="row">
                                
                                <div class="form-group col-md-4">
                                    <label for="giro">Giro empresarial</label>
                                    <input type="text" class="form-control{{ $errors->has('giro') ? ' is-invalid' : '' }}" id="giro" name="giro" maxlength="200" value="{{ $all->giro }}" placeholder="Ingrese giro de la empresa" required autofocus>
                                    @if ($errors->has('giro'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('giro') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                   <div class="form-group col-md-4">
                                <label for="enlace">Link de la pagina web</label>
                                <input type="text" class="form-control{{ $errors->has('enlace') ? ' is-invalid' : '' }}" id="enlace" name="enlace" maxlength="200" value="{{ $all->test_link}}" placeholder="Ingrese un enlace"  autofocus>
                                @if ($errors->has('enlace'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('enlace') }}</strong>
                                    </span>
                                @endif
                            </div>
                                   <div class="form-group col-md-4">
                                    <label for="ubicacion">Ubicacion</label>
                                    <input type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" id="ubicacion" name="ubicacion" maxlength="300" value="{{ $all->location }}" placeholder="Direccion de la matriz, oficinas centrales o sucursal" required autofocus>
                                    @if ($errors->has('ubicacion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ubicacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                             <div class="form-group col-md-12">
                                <label for="description">Descripci贸n</label>
                                <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="Ingrese una descripci贸n de la empresa" rows="5" maxlength="500" autofocus required>{{ $all->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                     
                        <div class="row">
                            @if (empty($all->image))
                            
                            @else
                            <div class="form-group col-md-6" align="center">
                                <img src="{{ asset('public/img/'.$all->image.'') }}" class="img-fluid" height="150" width="150" alt="user_image">
                            </div>  
                            @endif
                            <div class="form-group col-md-6">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" id="imagen" name="imagen" accept="image/*" value="{{ old('imagen') }}" autofocus>
                                @if ($errors->has('imagen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('imagen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" align="right">
                                  <a  href="{{ url('/root/enterprise/all') }}" class="btn btn-secondary">Cancelar</a>
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
    $("#telefono").inputmask({"mask": "(+52) 999-999-99-99"});
});
</script>

@endsection
