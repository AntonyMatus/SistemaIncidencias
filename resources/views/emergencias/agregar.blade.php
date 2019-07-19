@extends('layouts.template')
@section('styles')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
@endsection

@section('breadcrumbs', Breadcrumbs::render('emergencias.agregar'))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-6">
        <h4 class="card-header text-center"><i class="fa fa-building-o"></i>{{__('Agregar Emergencia')}}
        </h4>
        <div class="card-body">
        <form action="{{ route('emergencias.agregar') }}" id="form-agregar" method="POST" class="form-horizontal" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="tipo_emergencia" class="form-control-label">{{__('Nombre de la  Emergencia')}}</label>
                <input type="text" class="form-control" name="tipo_emergencia" id="tipo_emergencia" placeholder="Nombre de la Emergencia" value="{{old('tipo_emergencia')}}">
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button id="btnSave"type="submit" class="btn btn-outline-primary">{{__('Guardar')}}</button>
                    <a href="{{ route('emergencias.index') }}" class="btn btn-outline-success">{{__('Cancelar')}}</a>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
@endsection

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
        tipo_emergencia: {
            validators: {
                notEmpty: {
                    message: 'El campo Nombre de la Emergencia es requerido!.'
                },
                stringLength: {
                    max: 255,
                    message: 'La longitud máxima es de 255 caracteres!'
                },
                regexp: {
                    regexp: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/,
                    message:"Solo se permiten Letrás con o sin acento!"
                }
            }
        }
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
    $('#tipo_emergencia').keyup(function () {
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