@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('LISTA DE PROYECTOS') }}</div>
                <input type="text" name="buscar" id="buscar-vacante" placeholder="BUSCAR">
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
                                <th scope="col">Puesto</th>
                                <th scope="col">Contrato</th>
                                <th scope="col">Requisitos</th>
                                <th scope="col">Descripci贸n</th>
                                <th scope="col">Test</th>
                                <th scope="col">Empresa</th>

                            </tr>
                        </thead>
                        <tbody id="tabla-vacantes">
                            <!-- {{$i = 1}} -->
                            @foreach($servicios as $servicio)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                               
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
    <script type="text/javascript">
        $(document).ready(function (){
            
             $("#buscar-vacante").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-vacantes tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
        });
    </script>
@endsection