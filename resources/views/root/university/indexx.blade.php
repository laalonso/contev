@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Universidades</li>
              </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('UNIVERSIDADES') }}</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="instituciones" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Admin</th>
                            </tr>
                        </thead>
                          <tbody id="tabla-uni">
                              <tr>
                                  <td class="text-center" colspan="6"><div class="spinner text-center"></div></td>
                              </tr>
                          </tbody>
                    </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
 
<!-------------- Modal ------>

        <div class="modal face" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="nombre-escuela" style="text-transform: uppercase;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <h2>RESEÑA:</h2>
                    <div id="descripcion" style="text-align: justify;"></div>
                  </li>
                  <li class="list-group-item">
                    <h2>MISIÓN:</h2>
                    <div id="mision" style="text-align: justify;"></div>
                  </li>
                  <li class="list-group-item">
                    <h2>VISIÓN:</h2>
                     <div id="vision" style="text-align: justify;"></div>
                  </li>

                  <li class="list-group-item">
                    <h2>UNIDADES ACADÉMICAS:</h2>
                     <div id="unidades" style="text-align: justify;"></div>
                  </li>

                   <li class="list-group-item">
                      <div class="d-inline"><h3>Página Web:</h3><a id="pagina" target="blank" href=""></a></div>
                  </li>
                  <li class="list-group-item">
                      <div class="d-inline"><h3>Correo:</h3><a id="correo" target="blank" href=""></a></div>
                  </li>
                  <li class="list-group-item">
                      <div><h3>Facebook:</h3><a id="face" target="blank" href=""></a></div>
                  </li>
                  <li class="list-group-item">
                      <div><h3>Twitter:</h3><a id="twitter" target="blank" href=""></a></div>
                  </li>
                </ul>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
               
              </div>
            </div>
          </div>
        </div>
</div>
@endsection

@section('js')
      <script>
        $(document).ready(function() {      
            var datos; 
            $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllSubsTecno', function(data){
                datos=data;
                $("#tabla-uni").html('');
                for(var i=0;i<data.length;i++){                  
                    $("#tabla-uni").append("<tr><td>"+(i+1)+"</td><td>"+data[i].Nombre+"</td><td>"+data[i].NoTelefono+"</td><td>"+data[i].Correo+"</td><td><a class='btn-detalles btn btn-primary' id='"+data[i].Id_Subsistema+"' role='button'>Detalles</a></td><td><a class='btn btn-primary' href='/root/university/encargado/"+data[i].Id_Subsistema+"' role='button'>Asignar</a></td></tr>");                       
                }
            });

            $("#tabla-uni").on("click",".btn-detalles",function(){
                var id_subsistema=$(this).attr("id");

                $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/'+id_subsistema, function(data){
                        $("#nombre-escuela").text(data[0].Nombre);
                        $("#descripcion").text(data[0].Reseña);
                        $("#mision").text(data[0].Mision);
                        $("#vision").text(data[0].Vision);
                        $("#pagina").text(data[0].PaginaWeb);
                        $("#pagina").attr("href",data[0].PaginaWeb);
                        $("#correo").text(data[0].Correo);
                        $("#correo").attr("href","mailto:"+data[0].Correo);
                        $("#face").text(data[0].Facebook);
                        $("#face").attr("href",data[0].Facebook);
                        $("#twitter").text(data[0].Twitter);
                        $("#twitter").attr("href",data[0].Twitter);
                    });
                    
                  $.ajaxSetup({async : false});
                    $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllEscSubId/'+id_subsistema, function(data){
                        
                           var html='<div class="accordion" id="accordion">';
                        for(var i=0;i<data.length;i++){
                            var id_escuela=data[i].Id_Escuela;
                            var id_modalidad=data[i].Modalidad;
                              html+='<div class="card">';
                               html+='<div class="card-header" id="heading'+i+'">';
                                html+='<h2 class="mb-0">';
                                  html+='<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse'+i+'" aria-expanded="true" aria-controls="collapse'+i+'">';
$.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdModalidad/'+id_modalidad, function(data3){
                                      html+=data3[0].Nombre+' : ';
});

                                          html+=data[i].Nombre;
                                        html+='</button>';
                                       html+='</h2>';
                                     html+='</div>';

                                html+='<div id="collapse'+i+'" class="collapse" aria-labelledby="heading'+i+'" data-parent="#accordion">';
                                  html+='<div class="card-body">';
                                      $.getJSON('https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/aievac/GetAllOfertaEscIdSub/'+id_escuela, function(data2){

                                            html+='<ul> <h3>CARRERAS:</h3>';
                                            for(var k=0;k<data2.length;k++){
                                              html+='<li>'+(k+1)+'.-'+data2[k].Nombre_Carrera+'</li>'; 

                                            }
                                            html+='</ul>';
                                      });
                                  html+='</div>';
                                html+='</div>';
                              html+='</div>';
                        }
                            html+='</div>';
                      $("#unidades").html(html);
                    });

                $('#detallesModal').modal('show');
            });
            
            
          });
          
   
    </script>
    
    <script>
    $.ajaxSetup({async : true});

	$('#instituciones').DataTable({
              "order": [],
              language: {
                      url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es-mx.json'
                  }
             });
</script>
@endsection
