<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <title>Reporte Servicios Improcedentes</title>
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
            <p id="negritas2">Emito el resumen de los servicios improcedentes  correspondientes del {{$diaini}} al {{$diaout}} del mes {{$mesini}} del presente año, con un total de {{$count_improcedente}} Servicios Improcedentes</p>
            </div>
            <br>
                <table>
                        <thead>
                          <tr>
                            <th >Nombre del <br>Personal al Mando</th>
                            <th >Tipo de Emergencia </th>
                            <th>Emergencia</th>
                            <th>Descripción de la Emergencia</th>
                            <th>Fecha de Reporte</th>                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($improcedentes as $improcedente)
                            <tr>
                                <td>{{$improcedente->personal->nombre_completo}} </td>
                                <td>{{$improcedente->emergencias->tipo_emergencia}}</td>
                                <td> {{$improcedente->emergencia}}</td>
                                <td>{{$improcedente->descripción_emergencia}}</td>
                                <td>{{$improcedente->fecha_reporte}}</td>
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