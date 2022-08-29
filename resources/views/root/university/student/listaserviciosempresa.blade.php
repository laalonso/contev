@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('LISTA DE SERVICIOS') }}</div>
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
                        <table id="td-servicios" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Postulación</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-empresas">
                                <!-- {{$i = 1}} -->
                                @foreach($servicios as $servicio)
    @php
                                $universidad_id=Auth::user()->university()->first()->id;
                                $postulacion=App\University::find($universidad_id)->enterpriseServices()->where('enterprise_service_id',$servicio->id)->first();
    @endphp
    @if(!$postulacion)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $servicio->name }}</td>
                                    <td>{{ $servicio->area}}</td>
                                    <td>{{ $servicio->type }}</td>
                                    <td>{{ $servicio->description }}</td>
                                    <td>{{ $servicio->enterprise->name}}</td>
                                    <td><a class="btn btn-primary" href="/university/empresas/servicios/postular/{{encrypt($servicio->id)}}">Postular</a></td>
                                </tr>
    @endif
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
	 $('#td-servicios').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection


