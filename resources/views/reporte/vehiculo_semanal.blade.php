<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <title>Reporte Semanal Vehiculos</title>
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
                <p id="negritas2">Emito el acumulativo de los vehículos correspondientes del presente año</p>
            </div>
            <br>
                <table>
                        <thead>
                          <tr>
                            <th >SERVICIOS <br> (Subdirección de Bomberos)</th>
                            <th >TOTAL <br> SEMANAL</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">B-01</th>
                            <td class="text-center">{{$veh1}}</td>
                            
                          </tr>
                          <tr>
                            <td class="text-center">B-02</td>
                            <td class="text-center">{{$veh2}} </td>
                           
                          </tr>
                          <tr>
                            <td class="text-center">B-03</td>
                            <td class="text-center">{{$veh3}} </td>
                           
                          </tr>
                          <tr>
                              <td class="text-center">B-04</td>
                              <td class="text-center">{{$veh4}}</td>
                            
                          </tr>
                          <tr>
                               <td class="text-center">B-105</td>
                               <td class="text-center">{{$veh5}} </td>
                            
                          </tr>
                          <tr>
                              <td class="text-center">B-106</td>
                              <td class="text-center">{{$veh6}} </td>
                            
                          </tr>
                          <tr>
                              <td class="text-center">B-108</td>
                              <td class="text-center">{{$veh7}} </td>
                            
                          </tr>
                          <tr>
                              <td class="text-center">B-109</td>
                              <td class="text-center">{{$veh8}} </td>
                            
                          </tr>
                          <tr>
                            <td class="text-center">B-110</td>
                            <td class="text-center">{{$veh9}} </td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">B-111</td>
                            <td class="text-center">{{$veh10}} </td>
                          
                        </tr>
                        <tr>
                            <td class="text-center">B-112</td>
                            <td class="text-center">{{$veh11}} </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">B-113</td>
                            <td class="text-center">{{$veh12}} </td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">B-114.</td>
                            <td class="text-center">{{$veh13}} </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">B-115</td>
                            <td class="text-center">{{$veh14}} </td>
                          
                        </tr>
                        <tr>
                            <td class="text-center" >TOTAL:</td>
                        <td class="text-center">{{$total_semanalvehiculo}}</td>
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