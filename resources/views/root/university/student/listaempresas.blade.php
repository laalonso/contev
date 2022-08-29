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
                <div class="card-header">{{ __('LISTA DE EMPRESAS') }}</div>
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
                        <table id="td-empresas" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Giro empresarial</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Página web</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-empresas">
                                <!-- {{$i = 1}} -->
                                @foreach($empresas as $empresa)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $empresa->name }}</td>
                                    <td>{{ $empresa->giro }}</td>
                                    <td>{{ $empresa->phone }}</td>
                                    <td>{{ $empresa->email }}</td>
                                    <td><a class="btn btn-primary" role="button" target="_blank" href="{{ $empresa->test_link }}">Página web</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div>
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
    <script>
	 $('#td-empresas').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection


