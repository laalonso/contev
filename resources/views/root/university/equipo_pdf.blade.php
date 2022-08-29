<html>
    <head>
        <style>
            .text-center{
                text-align:center;
            }
            table{
                border-collapse: collapse;
                font-size:0.8em;
                width:100%;
            }
        </style>
    </head>
    <body>
        <div>
            <h3 class="text-center">EQUIPO ESPECIALIZADO ASIGNADO</h3>
            <h4 class="text-center" >{{$institucion}}</h4>
            <h5 class="text-center">SERVICIO: {{$servicio->name}}</h5>
            <h5 class="text-center">TIPO DE SERVICIO: {{$servicio->type}}</h5>
        </div>
        <table border="1" class="table table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th class="text-center" scope="col">INVENTARIO</th>
              <th class="text-center" scope="col">NOMBRE</th>
              <th class="text-center" scope="col">MARCA</th>
              <th class="text-center" scope="col">MODELO</th>
            </tr>
          </thead>
          <tbody>
            @foreach($equipos as $equipo)
            <tr>
              <th class="text-center" scope="row">{{$loop->index+1}}</th>
              <td class="text-center">{{$equipo->inventario}}</td>
              <td class="text-center">{{$equipo->nombre}}</td>
              <td class="text-center">{{$equipo->marca}}</td>
              <td class="text-center">{{$equipo->modelo}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </body>
</html>