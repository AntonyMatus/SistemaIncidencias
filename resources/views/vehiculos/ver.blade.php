@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('vehiculos.ver', $modelo->vehiculo_unidad))

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-car"></i> {{__('Detalle vehiculo')}}</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                <div class="form-horizontal">
                <label for="detalle" ><p>{{__('Unidad del Vehiculo:')}}  {{$modelo->vehiculo_unidad}}</p></label>
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
                <label for="detalle" >{{__('Imagen del Vehiculo:')}} <img src="{{ asset('storage').'/'. $modelo->imagen}}" class="img-thumbnail img-fluid" alt="" width="350"> </label>
                   
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