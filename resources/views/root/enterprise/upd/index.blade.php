@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
          </ol>
        </nav>
            <div class="card">
                <div class="card-header">  {{ __('La información capturada será visible para los estudiantes y los encargados de los planteles educativos') }} </div>
                <div class="card-body">
                    <div id="img-estudiante">
                        <img class="img-fluid" style="border-radius: 50%" src="{{asset('img/'.Auth::User()->image)}}">
                                                        
                      </div>
                    <ul class="list-group list-group-flush">
                       
                        <li class="list-group-item">
                            <strong>NOMBRE:</strong> {{Auth::User()->name}} {{Auth::User()->f_surname}} {{Auth::User()->s_surname}}
                        </li>
                        <li class="list-group-item">
                            <strong>TELÉFONO:</strong> {{Auth::User()->phone}}
                        </li>
                        <li class="list-group-item">
                            <strong>CORREO DE USUARIO:</strong> {{Auth::User()->email}}
                        </li>   
                 
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  {{ __('DATOS PERSONALES') }}</div>
 @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        
                 
                        <li class="list-group-item">
                            <strong>NOMBRE DE LA EMPRESA:</strong> {{Auth::User()->asignar->enterprise->name}}
                         </li>
                          <li class="list-group-item">
                            <strong>TELÉFONO DE LA EMPRESA:</strong> {{Auth::User()->asignar->enterprise->phone}}
                         </li>
                          <li class="list-group-item">
                            <strong>EMAIL DE LA EMPRESA:</strong> {{Auth::User()->asignar->enterprise->email}}
                         </li>
                          <li class="list-group-item">
                            <strong>GIRO DE LA EMPRESA:</strong> {{Auth::User()->asignar->enterprise->giro}}
                         </li>
                         
                          <li class="list-group-item">
                            <strong>DESCRIPCIÓN DE LA EMPRESA:</strong> {{Auth::User()->asignar->enterprise->description}}
                         </li>
                         <li class="list-group-item">
                            <strong>SITIO WEB LA EMPRESA:</strong> {{Auth::User()->asignar->enterprise->test_link}}
                         </li>
                      
                    </ul>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      ACTUALIZAR INFORMACIÓN
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form method="post" action="enterprise/perfil/actualizar" enctype="multipart/form-data">
                 @csrf
                 <div class="row">
                 <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" value="{{Auth::User()->asignar->enterprise->name}}" id="nombre" name="nombre">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="tel">Teléfono</label>
                    <input type="tel" class="form-control" value="{{Auth::User()->asignar->enterprise->phone}}" id="tel" name="tel">
                  </div>
                  
                   <div class="form-group col-md-4">
                    <label for="correo">Email</label>
                    <input type="email" class="form-control" value="{{Auth::User()->asignar->enterprise->email}}" id="correo" name="correo">
                  </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="grm">Giro empresarial</label>
                    <input type="text" class="form-control" value="{{Auth::User()->asignar->enterprise->giro}}" id="grm" name="grm">
                  </div>
                  
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" value="{{Auth::User()->asignar->enterprise->description}}" id="descripcion" name="descripcion">
                  </div>
                  
                  <div class="form-group">
                    <label for="wde">Sitio web de la empresa</label>
                    <input type="text" class="form-control" value="{{Auth::User()->asignar->enterprise->test_link}}" id="wde" name="wde">
                  </div>
            
                    
          <input class="btn btn-primary" type="submit" value="Actualiar">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
