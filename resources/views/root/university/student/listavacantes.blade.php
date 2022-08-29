@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('LISTA DE VACANTES') }}</div>
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
                        <table id="td-vacantes" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Contrato</th>
                                    <th scope="col">Requisitos</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Test</th>
                                    <th scope="col">Empresa</th>

                                </tr>
                            </thead>
                            <tbody id="tabla-vacantes">
                                <!-- {{$i = 1}} -->
                                @foreach($vacantes as $vacante)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $vacante->position }}</td>
                                    <td>{{ $vacante->type }}</td>
                                    <td>{{ $vacante->requeriments }}</td>
                                    <td>{{ $vacante->description }}</td>
                                    <td>{{ $vacante->test_link}}</td>
                                    <td>{{ $vacante->enterprise->name }}</td>
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
    <script>
	 $('#td-vacantes').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection
