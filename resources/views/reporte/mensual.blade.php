<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <title>Reporte Mensual</title>
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
                <p id="negritas2">Emito el resumen de las actividades correspondientes al mes {{$mes2}} del presente año</p>
            </div>
            <br>
                <table>
                        <thead>
                          <tr>
                            <th >SERVICIOS <br> (Subdirección de Bomberos)</th>
                            <th >TOTAL <br> SEMANAL</th>
                            <th>ACUMULADO</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >Retiro de objetos y animales en la via pública</th>
                            <td class="text-center">{{$mes_emer1}} </td>
                            <td class="text-center">{{$año_emer1}} </td>
                          </tr>
                          <tr>
                            <td>Incendios de basura y maleza</td>
                            <td class="text-center">{{$mes_emer2}} </td>
                            <td class="text-center">{{$año_emer2}} </td>
                          </tr>
                          <tr>
                            <td >Servicios diversos</td>
                            <td class="text-center">{{$mes_emer3}}</td>
                            <td class="text-center">{{$año_emer3}} </td>
                          </tr>
                          <tr>
                              <td >Auxilio social de apoyo con agua</td>
                              <td class="text-center">{{$mes_emer4}}</td>
                              <td class="text-center">{{$año_emer4}} </td>
                          </tr>
                          <tr>
                                <td>Servicios Improcedentes</td>
                               <td class="text-center">{{$mes_emer5}}</td>
                               <td class="text-center">{{$año_emer5}} </td>
                          </tr>
                          <tr>
                              <td>Conatos de incendios</td>
                              <td class="text-center">{{$mes_emer6}} </td>
                              <td class="text-center">{{$año_emer6}} </td>
                          </tr>
                          <tr>
                              <td>Fuga de cilindros de gas LP.</td>
                              <td class="text-center">{{$mes_emer7}} </td>
                              <td class="text-center">{{$año_emer7}} </td>
                          </tr>
                          <tr>
                              <td >Combate de abejas y avispas</td>
                              <td class="text-center">{{$mes_emer8}} </td>
                              <td class="text-center">{{$año_emer8}} </td>
                          </tr>
                          <tr>
                            <td >Retiro de objetos y animales en domicilios</td>
                            <td class="text-center">{{$mes_emer9}}</td>
                            <td class="text-center">{{$año_emer9}} </td>
                        </tr>
                        <tr>
                            <td >Platicas de Bomberismo</td>
                            <td class="text-center">{{$mes_emer10}}</td>
                            <td class="text-center"> {{$año_emer10}}</td>
                        </tr>
                        <tr>
                            <td >Incendios de Vehiculos</td>
                            <td class="text-center">{{$mes_emer11}} </td>
                            <td class="text-center">{{$año_emer11}} </td>
                        </tr>
                        <tr>
                            <td >Incendio de casa habitación</td>
                            <td class="text-center">{{$mes_emer12}}</td>
                            <td class="text-center">{{$año_emer12}} </td>
                        </tr>
                        <tr>
                            <td >Entrega de constancia de fuga de gas LP.</td>
                            <td class="text-center">{{$mes_emer13}}</td>
                            <td class="text-center">{{$año_emer13}} </td>
                        </tr>
                        <tr>
                            <td >Incendios de comercios</td>
                            <td class="text-center">{{$mes_emer14}} </td>
                            <td class="text-center">{{$año_emer14}} </td>
                        </tr>
                        <tr>
                            <td >Entrega de animales capturados y objetos a instituciones y a particulares</td>
                            <td class="text-center">{{$mes_emer15}} </td>
                            <td class="text-center">{{$año_emer15}} </td>
                        </tr>
                        <tr>
                            <td class="text-center" >TOTAL:</td>
                                <td class="text-center"> {{$total_mensual}} </td>
                                <td class="text-center">{{$total_acumulado}} </td>
                            </tr>
                        </tbody>
                      </table>
        
    </div>
    <footer>
        <img src="img/logo.png" alt="" class="float-left" width="330px" height="100px">
        <img src="img/logo2.png" alt="" class="float-right" width="200px" height="90px">
    </footer>
    

</body>
</html>