<html>
    <head>
        <style>
            .text-center{
                text-align:center;
            }
            table{
                border-collapse: collapse;
                font-size:0.8em;
            }
        </style>
    </head>
    <body>
        <div>
            <h3 class="text-center">PERSONAL ESPECIALIZADO ASIGNADO</h3>
            <h4 class="text-center" >{{$institucion}}</h4>
            <h5 class="text-center">SERVICIO: {{$servicio->name}}</h5>
            <h5 class="text-center">TIPO DE SERVICIO: {{$servicio->type}}</h5>
        </div>
        <table border="1" class="table table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th class="text-center" scope="col">ADSCRIPCIÓN</th>
              <th class="text-center" scope="col">NOMBRE COMPLETO</th>
              <th class="text-center" scope="col">GRADO ACADÉMICO</th>
              <th class="text-center" scope="col">LÍNEAS DE INVESTIGACIÓN</th>
              <th class="text-center" scope="col">CERTIFICACIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($personal as $persona)
            <tr>
              <th class="text-center" scope="row">{{$loop->index+1}}</th>
              <td class="text-center">{{$persona->carrera}}</td>
              <td class="text-center">{{$persona->nombre}}</td>
              <td class="text-center">{{$persona->grado}}</td>
              <td class="text-center">{{$persona->lineas}}</td>
              <td class="text-center">{{$persona->certificaciones}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </body>
</html>