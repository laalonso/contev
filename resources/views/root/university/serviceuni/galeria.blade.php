@extends('layouts.app')
@section('meta')
    <link href="{{asset('/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/css/style.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!--=====================================-->
    <!--=        Newsfeed  Area Start       =-->
    <!--=====================================-->
    <div class="container">
        <br><br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/university/services/">Servicios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galería</li>
            </ol>
        </nav>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">SERVICIO</div>
                
                    <div class="card-body">
                            <h3 class="text-center">{{$servicio->name}}</h3>
                            <p class="text-justify">{{$servicio->details_laboratory}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-page">      
            <div class="row">
            @foreach($equipos as $equipo)
                @php
                    $imagenes=$equipo->equipoImagens()->get();
                @endphp
                @foreach($imagenes as $imagen)                   
                    <div class="col-lg-4 col-md-6">
                        <div class="block-box product-box">
                            <div class="product-img">
                                <a href=""><img class="img-fluid imagen" style="width:280px;height:230px;" src="{{asset('/img/'.$imagen->img)}}" alt="product"></a>
                            </div>
                            <div class="product-content">
                                <div class="item-category">
                                    {{$equipo->nombre}}
                                </div>
                                <h3 class="product-title">{{$equipo->marca}}</h3>
                                <div class="product-price"><a style="text-decoration:none;color:red;" id="{{encrypt($imagen->id)}}" class="eliminar"><i class="fas fa-trash-alt"></i></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
            </div>
        </div>
        
        <!-- Modal Eliminar -->
<div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="label-eliminar">ELIMINAR IMAGEN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="msj-eliminar" class="modal-body">
            ¿Está usted seguro que desea eliminar está Imagen?<br>
            <img id="imagen-eliminar" src="" alt="">
      </div>
      <div class="modal-footer">
        <form id="form-eliminar" method="post" action="/university/services/equipment/galeria/imagen/eliminar">
            @csrf
            <input type="hidden" id="eliminar_id" name="eliminar_id" value="">
            <input type="hidden" id="servicio_id" name="servicio_id" value="{{encrypt($servicio->id)}}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-danger">ELIMINAR</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $(".eliminar").click(function(){
                var imagen_id=$(this).attr("id");
                var imagen=$(this).parents('.product-box').find('.imagen').attr("src");
                $("#eliminar_id").val(imagen_id);
                $("#imagen-eliminar").attr("src",imagen);
                $('#modal-eliminar').modal('show');
            });
        });
    </script>
@endsection