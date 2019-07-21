@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('registros.ver', $modelo->fecha_reporte))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-8 border-primary">
        <h4 class="card-header text-center"><i class="fa fa-book"></i>{{__('Ver Registro')}}
        </h4>
        <div class="card-body">
            <div class="form-group">
            <h4 class="text-center">{{$sub_estacion}}</h4>
            </div>
            <br>
            <div class="form-group">
            <p class="text-justify">Siendo las {{$modelo->hora_salida}} Hrs. Salio de la base la unidad {{$unidad}} , al mando del {{$modelo->personal->cargo->cargo}} {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}}  y {{$modelo->num_escoltas}} escoltas, con destino a la {{$modelo->dirección}}, donde reporta la central de radio C5, {{$modelo->emergencia}} {{$modelo->descripción_emergencia}}, retornando la unidad a su base a las {{$modelo->hora_retorno}} hrs. Se beneficia a {{$modelo->personas_atendidas}} personas. </p>
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