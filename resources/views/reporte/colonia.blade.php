<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <title>Reporte Por Colonia</title>
</head>
<body>
    <header id="main-header">
        <img src="img/escudo_seprocy.png" alt="" class="rounded float-right d-inline" width="150px" height="90px">
        <img src="img/escudo.png" alt="" class="rounded float-left" width="70px" height="90px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label id="negritas" class="text-center">2019, Año del Centenario Luctuoso del General Emiliano Zapata, Caudillo del Sur</label>
        
    </header>
    <div class="container">
            <div class="col-md-6">
                <p id="negritas2">Oficio Núm: SEPROCI-DAE/055/2019 <br>
                Asunto: Resumen de Actividades <br>
                San Francisco de Campeche, Camp.</p>
            </div>
            <br>
            
            <div class="col-md-6">
                    <p id="negritas2">Ing. Edgar Hernández Hernández<br>
                    Secretario de Protección Civil <br>
                    Presente.</p>
            </div>
            <br>

            <div class="col-md-12">
            <p id="negritas2">Emito el resumen de los servicios correspondientes del {{$diaini}} al {{$diaout}} del mes {{$mesini}} del presente año, con un total de {{$count_colonia}} Servicios en la colonia {{$colonia}}</p>
            </div>
            <br>
                <table>
                        <thead>
                          <tr>
                            <th >Nombre del <br>Personal</th>
                            <th >Tipo de Emergencia</th>
                            <th>Colonia</th>
                            <th>calle</th>
                            <th>Entre Calles</th>
                            <th>Fecha de Reporte</th>                          
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($info_colonia as $info)
                           <tr>
                            <td>{{$info->personal->nombre_completo}} </td>
                            <td>{{$info->emergencias->tipo_emergencia}}</td>
                           <td>{{$colonia}}</td>
                           <td>{{$info->calle}}</td>
                           <td>{{$info->entre_calle}}</td>
                           <td>{{$info->fecha_reporte}}</td>
                            </tr>
                           @endforeach
                            
                           
                        </tbody>
                      </table>
        
    </div>
    <footer>
        <img src="img/logo.png" alt="" class="float-left" width="330px" height="100px">
        <img src="img/logo2.png" alt="" class="float-right" width="200px" height="90px">
    </footer>
    

</body>
</html>