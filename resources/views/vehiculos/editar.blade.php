@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('vehiculos.editar'))

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-car"></i> {{__('Editar Vehiculo')}}</h3>
    </div>
    <div class="panel-body">
        <div class="container">
            <form action="{{ route('vehiculos.editar', [ 'id' => $modelo->id]) }}" id="form-editar" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unidad" class="form-control-label">{{__('Unidad')}}</label>
                            <input type="text" class="form-control" name="vehiculo_unidad" id="vehiculo_unidad" value="{{old('vehiculo_unidad')}}{{$modelo->vehiculo_unidad}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="No_serie" class="form-control-label">{{__('Numero de Serie')}}</label>
                            <input type="text" class="form-control" name="num_serie" id="num_serie" value="{{old('num_serie')}}{{$modelo->num_serie}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Inventario" class="form-control-label">{{__('Inventario')}}</label>
                            <input type="text" class="form-control" name="inventario" id="inventario" value="{{old('inventario')}}{{$modelo->inventario}} ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="No_Motor" class="form-control-label">{{__('Numero del Motor')}}</label>
                            <input type="text" class="form-control" name="no_motor" id="no_motor" value="{{old('no_motor')}}{{$modelo->no_motor}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Marca" class="form-control-label">{{__('Marca')}}</label>
                            <input type="text" class="form-control" name="marca" id="marca" value="{{old('marca')}}{{$modelo->marca}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Modelo" class="form-control-label">{{__('Modelo')}}</label>
                            <input type="text" class="form-control" name="modelo" id="modelo" value="{{old('modelo')}}{{$modelo->modelo}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Placas" class="form-control-label">{{__('Placas')}}</label>
                            <input type="text" class="form-control" name="placas" id="placas" value="{{old('placas')}}{{$modelo->placas}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row form-material">
                            <label for="estatus_vehiculo" class="col-form-label form-control-label">{{__('Estado de la Unidad')}}</label>&nbsp;&nbsp;&nbsp;
                            <div>
                                @foreach (\Xhunter\Enumerable\EstatusVehiculo::getAll() as $key => $value)
                                    <div class="radio-custom radio-primary">
                                    <input type="radio" id="rado_{{$key}}" value="{{old('estatus_vehiculo')}} {{$key}}" name="estatus_vehiculo" @if(old('estatus_vehiculo',$modelo->estatus_vehiculo) == $key)checked @endif/>
                                        <label for="rado_{{$key}}">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imagen" class="form-control-label">{{__('Imagen del vehiculo')}}</label>
                            <br>
                            <img src="{{ asset('storage').'/'. $modelo->imagen}}" class="img-thumbnail img-fluid" alt="" width="350">
                            <br>
                            <input type="file" class="form-control" name="imagen" id="imagen" value="{{old('imagen')}}">
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button id="btnSave" type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                        <a href="{{ route('vehiculos.index') }}" class="btn btn-default">{{__('Cancelar')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop 

@section('scripts')
<script src="{{asset('vendor/formvalidation/formValidation.min.js')}}"></script>
<script src="{{asset('vendor/formvalidation/framework/bootstrap4.min.js')}}"></script>

<script>
    (function() {
    $('#form-editar').formValidation({
    framework: "bootstrap4",
    button: {
        selector: '#btnSave',
        disabled: 'disabled'
    },
    icon: null,
    fields: {
        vehiculo_unidad: {
            validators: {
                notEmpty: {
                    message: 'La Unidad del vehiculo es un campo requerido.'
                },
                stringLength: {
                    max: 6,
                    message: 'La longitud maxima es de 6 caracteres!'
                },
                regexp: {
                    regexp:  /^[A-Z]{1}-[\d]{1,3}$/, 
                    message:"La primera letra debe ser Máyuscula, seguido de un '-' y digitos. Ejemplo: B-103."
                }
            }
        },
    },
    err: {
        clazz: 'invalid-feedback'
    },
    control: {
        valid: 'is-valid',

        invalid: 'is-invalid'
    },
    row: {
        invalid: 'has-danger'
    }
    });


    $('#vehiculo_unidad').keyup(function () {
        let valor = $(this).val();
        if (valor != '')
        {
            let nuevoValor = valor.toUpperCase();
            $(this).val(nuevoValor);
        }
    });
})();
</script>
@endsection