@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('registros.ver', $modelo->fecha_reporte))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-8 border-primary">
        <h4 class="card-header text-center"><i class="fa fa-book"></i>{{__('Ver Registro')}}
        </h4>
        <div class="card-body">
            <div class="form-group">
                @if ($modelo->sub_estaciones == 1)
                <h4 class="text-center">SALIDA DE CILINDROS POR FUGA DE GAS</h4>
                @elseif($modelo->sub_estaciones == 2)
                <h4 class="text-center">ESTACIÓN DE BOMBEROS BASE # 1</h4>
                @elseif($modelo->sub_estaciones == 3)
                <h4 class="text-center">SUBESTACIÓN DE CD. CONCORDIA</h4>
                @elseif($modelo->sub_estaciones == 4)
                <h4 class="text-center">SUBESTACIÓN DE SANTA LUCIA</h4>
                @elseif($modelo->sub_estaciones == 5)
                <h4 class="text-center">SUBESTACIÓN DE SOLIDARIDAD NACIONAL</h4>
                @elseif($modelo->sub_estaciones == 6)
                <h4 class="text-center">COMPLEMENTARIAS</h4>
                @endif
            
            </div>
            <br>
            <div class="form-group">
            <p class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs. Salio de la base la unidad {{$unidades}} , al mando del {{$modelo->personal->cargo->cargo}} {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}}  y {{$modelo->num_escoltas}} escoltas, con destino a la {{$modelo->dirección}}, donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripción_emergencia}}, retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-5">
                    <a href="{{ route('registros.index') }}" class="btn btn-outline-success">{{__('Volver')}}</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection