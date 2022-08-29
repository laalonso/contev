@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Empresas</li>
              </ol>
            </nav>
            
            <div class="card">
                <div class="card-header">{{ __('EMPRESAS') }}</div>                
               
                <div class="card-body">
                <a href="{{ url('/root/enterprise/all/create') }}" class="btn btn-success" role="botton">Añadir Empresa</a><br><br>
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
                                    <th scope="col">Nombre o Razon social</th>
                                    <th scope="col">Sector - Subsector </th>
                                    <th scope="col">Descripción</th>
                                    <!--<th scope="col">A cargo</th>-->
                                    <th scope="col">Dir</th>
                                    <th scope="col">Add</th>
                                    <th scope="col">Acciones</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tabla-empi">
                                <!-- {{$i = 1}} -->
                                @foreach($all as $info)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $info->nombre }}</td>
                                  <!--  <td>{{ $info->phone }}</td>
                                    <td>{{ $info->email }}</td>-->
                                    <td>{{ $info->sector }} {{ $info->subsector }}</td>

                                    <td>{{ $info->description }}</td>   
                                  
                                
                                
                                    <td>
                                        <form action=" {{ url('/root/addressenterprise/all/'.encrypt($info->id).'')}}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-dark">           
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-map" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98l4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td><a class='btn btn-primary' href='/root/enterprise/encargadoempresa/{{($info->id)}}' role='button'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                                        <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        <path d="M8 12c4 0 5 1.755 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12z"/>
                                        </svg></a>
                                    </td>
                                    <td>
                                    <a href="{{ url('/root/enterprise/all/'.encrypt($info->id).'/edit') }}" onclick="return(confirm('¿Estás seguro de querer editar la empresa?'))" class="btn btn-info" role="button"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        </a>
                                    </td>
                                    <td>
                                    <form action="{{ url('/root/enterprise/all/'.encrypt($info->id)) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return(confirm('¿Estás seguro de querer eliminar la Empresa?'))">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                        </button>
                                        </form>
                                    </td>
                                    
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
  $("#buscar-emp").keyup(function(){
                _this = this;
                 // Show only matching TR, hide rest of them
                 $.each($("#tabla-empi tr"), function() {
                 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                 $(this).hide();
                 else
                 $(this).show();
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