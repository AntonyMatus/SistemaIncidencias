@extends('layouts.template')
@section('style')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
@endsection

@section('breadcrumbs', Breadcrumbs::render('emergencias.editar'))

@section('content')
<div class="container d-flex justify-content-center">
        <div class="card col-md-6 border-success mb-3">
            <h4 class="card-header text-center"><i class="fa fa-building-o"></i>{{__('Editar Emergencia')}}
            </h4>
            <div class="card-body">
            <form action="{{ route('emergencias.editar', [ 'id' => $modelo->id]) }}" id="form-editar" method="POST" class="form-horizontal" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="tipo_emergencia" class="form-control-label">{{__('Nombre de la Emergencia')}}</label>
                    <input type="text" class="form-control" name="tipo_emergencia" id="tipo_emergencia" placeholder="Nombre de la Emergencia"
                    value="{{old('tipo_emergencia', $modelo->tipo_emergencia)}} ">
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button id="btnSave" type="submit" class="btn btn-outline-primary">{{__('Guardar')}}</button>
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
        $('#form-editar').formValidation({
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
                        message: 'El campo Nombre de la Emergencia es requerido!'
                    },
                    stringLength: {
                        max: 255,
                        message: 'La longitud máxima es de 255 caracteres!'
                    },
                    regexp: {
                        regexp: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/,
                        message:"Solo se permiten Letrás!"
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