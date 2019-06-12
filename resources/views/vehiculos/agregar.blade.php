@extends('layouts.template')
@section('styles')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
<style>
    .form-group.has-danger .form-control-label {
        color: #f44336;
    }
    </style>
    
@stop
@section('breadcrumbs', Breadcrumbs::render('vehiculos.agregar'))

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-car"></i> {{__('Agregar Vehiculo')}}</h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
            <form action="{{ route('vehiculos.agregar') }}" id="form-agregar" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="nombre" class="form-control-label">{{__('Unidad')}}</label>
                    <input type="text" class="form-control" name="vehiculo_unidad" id="vehiculo_unidad" value="{{old('vehiculo_unidad')}}">
                </div>
                
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button id="btnSave"type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
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
    $('#form-agregar').formValidation({
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
                    message: 'La Unidad es un campo requerido.'
                },
                stringLength: {
                    max: 6,
                    message: 'La longitud máxima es de 6 caracteres!'
                },
                regexp: {
                    regexp: /^[A-Z]{1}-[\d]{1,3}$/,  
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

