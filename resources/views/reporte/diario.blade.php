<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <title>Reporte Diario</title>
</head>
<body>
    <header id="main-header">
        <img src="img/escudo_seprocy.png" alt="" class="rounded float-right d-inline" width="150px" height="90px">
        <img src="img/escudo.png" alt="" class="rounded float-left" width="70px" height="90px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label id="negritas" class="text-center">2019, Año del Centenario Luctuoso del General Emiliano Zapata, Caudillo del Sur</label>
        
    </header>
    <div class="container">
        <h5 class="text-center">SUB_ESTACION BASE # 1</h5>
        <br>
        <div class="col-md-12 d-flex justify-content-center ">
            @foreach ($sub_base1 as $modelo)
            @php
                $unidades = $modelo->vehiculos->pluck('vehiculo_unidad');
                $unidad = str_replace('[', '', $unidades);
                $unidad = str_replace(']', '', $unidad);
                $colonia = Xhunter\Enumerable\Colonias::getColonias($modelo->colonia);
             @endphp
            <p id="negritas" class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs.  Salio de la base la unidad {{$unidad}}, al mando del {{$modelo->personal->cargo->cargo}}  {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} y {{$modelo->num_escoltas}} escoltas, con destino a la calle {{$modelo->calle}} Num {{$modelo->num}} entre {{$modelo->entre_calle}} colonia {{$colonia}} , donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripcción_emergencia}} , retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
            <br>
            @endforeach   
        </div>
        <br>
        <h5 class="text-center">SUB_ESTACIÓN DE CONCORDIA</h5>
        <br>
        <div class="col-md-12 d-flex justify-content-center ">
                @foreach ($sub_concordia as $modelo)
                @php
                    $unidades = $modelo->vehiculos->pluck('vehiculo_unidad');
                    $unidad = str_replace('[', '', $unidades);
                    $unidad = str_replace(']', '', $unidad);
                    $colonia = Xhunter\Enumerable\Colonias::getColonias($modelo->colonia);
                 @endphp
                <p id="negritas" class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs.  Salio de la base la unidad {{$unidad}}, al mando del {{$modelo->personal->cargo->cargo}}  {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} y {{$modelo->num_escoltas}} escoltas, con destino a la calle {{$modelo->calle}} Num {{$modelo->num}} entre {{$modelo->entre_calle}} colonia {{$colonia}} , donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripcción_emergencia}} , retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
                <br>
                @endforeach   
            </div>
        <br>
        <h5 class="text-center">SUB_ESTACIÓN DE SANTA LUCIA</h5>
        <br>
        <div class="col-md-12 d-flex justify-content-center ">
                @foreach ($sub_santa_lucia as $modelo)
                @php
                    $unidades = $modelo->vehiculos->pluck('vehiculo_unidad');
                    $unidad = str_replace('[', '', $unidades);
                    $unidad = str_replace(']', '', $unidad);
                    $colonia = Xhunter\Enumerable\Colonias::getColonias($modelo->colonia);
                 @endphp
                <p id="negritas" class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs.  Salio de la base la unidad {{$unidad}}, al mando del {{$modelo->personal->cargo->cargo}}  {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} y {{$modelo->num_escoltas}} escoltas, con destino a la calle {{$modelo->calle}} Num {{$modelo->num}} entre {{$modelo->entre_calle}} colonia {{$colonia}} , donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripcción_emergencia}} , retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
                <br>
                @endforeach   
        </div>
        <br>
        <h5 class="text-center">SUB_ESTACIÓN DE SOLIDARIDAD NACIONAL</h5>
        <br>
        <div class="col-md-12 d-flex justify-content-center ">
                @foreach ($sub_solidaridad as $modelo)
                @php
                    $unidades = $modelo->vehiculos->pluck('vehiculo_unidad');
                    $unidad = str_replace('[', '', $unidades);
                    $unidad = str_replace(']', '', $unidad);
                    $colonia = Xhunter\Enumerable\Colonias::getColonias($modelo->colonia);
                 @endphp
                <p id="negritas" class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs.  Salio de la base la unidad {{$unidad}}, al mando del {{$modelo->personal->cargo->cargo}}  {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} y {{$modelo->num_escoltas}} escoltas, con destino a la calle {{$modelo->calle}} Num {{$modelo->num}} entre {{$modelo->entre_calle}} colonia {{$colonia}} , donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripcción_emergencia}} , retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
                @endforeach   
        </div>
        <br>
        <h5 class="text-center">SALIDA DE CILINDROS POR FUGA DE GAS</h5>
        <br>
        <div class="col-md-12 d-flex justify-content-center ">
                @foreach ($salida_cilindros as $modelo)
                @php
                    $unidades = $modelo->vehiculos->pluck('vehiculo_unidad');
                    $unidad = str_replace('[', '', $unidades);
                    $unidad = str_replace(']', '', $unidad);
                    $colonia = Xhunter\Enumerable\Colonias::getColonias($modelo->colonia);
                 @endphp
                <p id="negritas" class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs.  Salio de la base la unidad {{$unidad}}, al mando del {{$modelo->personal->cargo->cargo}}  {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} y {{$modelo->num_escoltas}} escoltas, con destino a la calle {{$modelo->calle}} Num {{$modelo->num}} entre {{$modelo->entre_calle}} colonia {{$colonia}} , donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripcción_emergencia}} , retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
                <br>
                @endforeach   
        </div>
        <br>
        <h5 class="text-center">COMPLEMENTARIAS</h5>
        <br>
        <div class="col-md-12 d-flex justify-content-center ">
                @foreach ($complementarias as $modelo)
                @php
                    $unidades = $modelo->vehiculos->pluck('vehiculo_unidad');
                    $unidad = str_replace('[', '', $unidades);
                    $unidad = str_replace(']', '', $unidad);
                    $colonia = Xhunter\Enumerable\Colonias::getColonias($modelo->colonia);
                 @endphp
                <p id="negritas" class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs.  Salio de la base la unidad {{$unidad}}, al mando del {{$modelo->personal->cargo->cargo}}  {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} y {{$modelo->num_escoltas}} escoltas, con destino a la calle {{$modelo->calle}} Num {{$modelo->num}} entre {{$modelo->entre_calle}} colonia {{$colonia}} , donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripcción_emergencia}} , retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
                <br>
                @endforeach   
        </div>
        <br>

        <div class="col-md-8">
                <table align="center">
                        <thead>
                          <tr>
                            <th >BASE Y SUBESTACIONES</th>
                            <th >SERVICIOS DIVERSOS</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >SALIDA DE CILINDROS DE FUGA DE GAS</th>
                            <td class="text-center">{{$count_salida_cilindros}} </td>
                          </tr>
                          <tr>
                            <td>ESTACIÓN DE BOMBEROS BASE #1</td>
                            <td class="text-center">{{$count_sub_base1}} </td>
                          </tr>
                          <tr>
                            <td >SUBESTACIÓN DE CD. CONCORDIA</td>
                            <td class="text-center">{{$count_sub_concordia}} </td>
                          </tr>
                          <tr>
                              <td >SUBESTACIÓN DE SANTA LUCIA</td>
                              <td class="text-center">{{$count_sub_santa_lucia}}</td>
                          </tr>
                          <tr>
                                <td>SUBESTACIÓN DE SOLIDARIDAD NACIONAL</td>
                               <td class="text-center">{{$count_sub_solidaridad}} </td>
                          </tr>
                          <tr>
                              <td>COMPLEMENTARIAS</td>
                              <td class="text-center">{{$count_complementarias}}</td>
                          </tr>
                          <tr>
                              <td>TOTAL DE SERVICIOS</td>
                          <td class="text-center">{{$count_servicios}}</td>
                          </tr>
                          <tr>
                              <td >TOTAL DE PERSONAS</td>
                          <td class="text-center">{{$total_personas}}</td>
                          </tr>
                        </tbody>
                      </table>
        </div>
    </div>
    <footer>
        <img src="img/logo.png" alt="" class="float-left" width="330px" height="100px">
        <img src="img/logo2.png" alt="" class="float-right" width="200px" height="90px">
    </footer>
    

</body>
</html>