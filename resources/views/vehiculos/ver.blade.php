@extends('layouts.template')

@section('styles')
@stop

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> {{__('Detalle vehiculo')}}</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                <div class="form-horizontal">
                <label for="detalle" id="nombre">{{__('Nombre del Vehiculo:')}} {{$modelo->vehiculo_unidad}}</label>
                   
                    <div class="form-group row">
                        <div class="offset-md-4 col-md-8">
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-success">{{__('Volver')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop