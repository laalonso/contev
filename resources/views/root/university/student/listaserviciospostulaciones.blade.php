@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('LISTA DE SERVICIOS POSTULADOS') }}</div>
                 @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="td-postulaciones" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Estatus</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-vacantes">
                                <!-- {{$i = 1}} -->

    @foreach($universidad->enterpriseServices as $enterpriseS)
    @php
        $empresa=App\Enterprise::find($enterpriseS->enterprise_id);
    @endphp
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{$enterpriseS->name}}</td>
                                    <td>{{$enterpriseS->area}}</td>
                                    <td>{{$enterpriseS->type}}</td>
                                    <td>{{$enterpriseS->description}}</td>
                                    <td>{{$empresa->name}}</td>
                                    <td>{{$empresa->email}}</td>
                                    <td>Pendiente</td>
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
	 $('#td-postulaciones').DataTable({
    "order": [],
    language: {
            url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
        }
   });
</script>
@endsection
