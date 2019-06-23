@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('vehiculos.ver', $modelo->vehiculo_unidad))

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-car"></i> {{__('Detalle vehiculo')}}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 text-center">
                    <label for="detalle">{{__('Imagen del Vehiculo:')}}</label>
                    <br>
                    <img src="{{ asset('storage').'/'. $modelo->imagen}}" class="img-thumbnail img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <div class="form-horizontal">
                    <br><br><br>
                        <label for="detalle" >{{__('Unidad del Vehiculo:')}}  {{$modelo->vehiculo_unidad}}</label>
                        <br>
                        <label for="detalle" >{{__('Numero de Serie del Vehiculo:')}} {{$modelo->num_serie}}</label>
                        <br>
                        <label for="detalle" >{{__('Inventario del Vehiculo:')}} {{$modelo->inventario}}</label>
                        <br>
                        <label for="detalle" >{{__('Numero del Motor del Vehiculo:')}} {{$modelo->no_motor}}</label>
                        <br>
                        <label for="detalle" >{{__('Marca del Vehiculo:')}} {{$modelo->marca}}</label>
                        <br>
                        <label for="detalle" >{{__('Modelo del Vehiculo:')}} {{$modelo->modelo}}</label>
                        <br>
                        <label for="detalle" >{{__('Placas del Vehiculo:')}} {{$modelo->placas}}</label>
                        <br>
                        <div class="form-group row">
                            <div class="offset-md-4 col-md-8">
                                <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-success">{{__('Volver')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop