@extends('layouts.app')

@section('content')
<div class="container">
    
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Contraseña</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <form action="/actualizarPassword" method="POST">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="actual">Contraseña Actual</label>
                            <input type="password" class="form-control" id="actual" name="actual" maxlength="45" value="" placeholder="" required autofocus>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="nueva">Contraseña Nueva</label>
                            <input type="password" class="form-control" id="nueva" name="nueva" maxlength="45" value="" placeholder="" required autofocus>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="confirmar">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirmar" name="confirmar" maxlength="45" value="" placeholder="" required autofocus>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-12" align="right">
                                <button class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>            

                    
@endsection