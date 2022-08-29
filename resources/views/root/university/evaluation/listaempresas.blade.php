@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        <table id="td-empresas" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-empresas">
                                <!-- {{$i = 1}} -->
                                @foreach($empresas as $empresa)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $empresa->name }}</td>
                                    <td>{{ $empresa->phone }}</td>
                                    <td>{{ $empresa->email }}</td>
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


