@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/university/services">Servicios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Empresas postuladas al servicio</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">SERVICIO: {{$servicio->name}} <br> DESCRIPCIÓN: {{$servicio->description}}</div>
                <input type="text" name="buscar" id="buscar-empresa" placeholder="BUSCAR">
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h2>LISTA DE EMPRESAS INTERESDAS EN EL SERVICIO</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Giro empresarial</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-empresas">
@foreach($servicio->asignar as $asignar)
    @php
                                    $empresa=App\Enterprise::find($asignar->enterprise_id);
    @endphp
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$empresa->name}}</td>
                                <td>{{$empresa->giro}}</td>
                                <td>{{$empresa->phone}}</td>
                                <td>{{$empresa->email}}</td>
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
            
             $("#buscar-empresa").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-empresas tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
                 });
                 });
        });
    </script>
@endsection


