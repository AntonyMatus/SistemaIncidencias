@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('registros.ver', $modelo->fecha_reporte))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-7 border-primary">
        <h4 class="card-header text-center"><i class="fa fa-book"></i>{{__('Ver Registro')}}
        </h4>
        <div class="card-body">
            <div class="form-group">
            <h4 class="text-center">DETALLE DEL REGISTRO</h4>
            </div>
            <br>
            <div class="text-left form-horizontal">
                <Label for="hora_salida"> {{__('Hora de Salida de la unidad: ')}} {{$modelo->hora_salida}} </Label>
                <br>
                <Label for="unidades"> {{__('Numero de Unidad(es): ')}} {{$unidad}} </Label>
                <br>
                <Label for="persona_al_mando"> {{__('Cargo del Personal al mando: ')}} {{$modelo->personal->cargo->cargo}} </Label>
                <br>
                <Label for="nombre_del_personal"> {{__('Nombre del Personal: ')}} {{$modelo->personal->nombre_completo}} {{$modelo->personal->apellido_paterno}} {{$modelo->personal->apellido_materno}} </Label>
                <br>
                <Label for="num_escoltas"> {{__('Numero de Escoltas: ')}} {{$modelo->num_escoltas}} </Label>
                <br>
                <Label for="calle"> {{__('Calle de la emergencia: ')}} {{$modelo->calle}} </Label>
                <br>
                <Label for="num"> {{__('Numero de la Calle de la Emergencia: ')}} {{$modelo->num}} </Label>
                <br>
                <Label for="colonia"> {{__('Colonia de la Emergencia: ')}} {{$colonia}} </Label>
                <br>
                <Label for="entre_calle"> {{__('Numero Entre calles de la Emergencia: ')}} {{$modelo->entre_calle}} </Label>
                <br>
                <Label for="emergencia"> {{__('Emergencia: ')}} {{$modelo->emergencia}} </Label>
                <br>
                <Label for="descripción"> {{__('Descripción de la emergencia: ')}} {{$modelo->descripción_emergencia}} </Label>
                <br>
                <Label for="hora_retorno"> {{__('Hora de Retorno de la unidad: ')}} {{$modelo->hora_retorno}} </Label>
                <br>
                <Label for="personas"> {{__('Numero de Personas atendidas: ')}} {{$modelo->personas_atendidas}} </Label>
                <br>
                <Label for="subestación"> {{__('SubEstación: ')}} {{$sub_estacion}}</Label>
                <br>
                <label for="tipo_servicio">{{__('Tipo de Servicio: ')}} @if($modelo->tipo_servicio == '1') Servicio Impricedente @elseif($modelo->tipo_servicio == '2') Servicio Procedente  @endif</label>

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