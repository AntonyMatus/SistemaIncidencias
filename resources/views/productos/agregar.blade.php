@extends('layouts.template')

@section('styles')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
<style>
.form-group.has-danger .form-control-label {
    color: #f44336;
}
</style>
@stop

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user"></i> {{__('Agregar Producto')}}</h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
            <form action="{{ route('productos.agregar') }}" id="form-agregar" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="nombre" class="form-control-label">{{__('Nombre del Producto')}}</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" required>
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle del producto</label>
                    <textarea name="detalle" class="form-control" id="detalle" cols="30" rows="10" required>{{old('detalle')}}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button id="btnSave"type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-default">{{__('Cancelar')}}</a>
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
        nombre: {
            validators: {
                notEmpty: {
                    message: 'El nombre del producto es un campo requerido.'
                },
                stringLength: {
                    max: 100,
                    message: 'El contenido debe tener menos de 100 caracteres.'
                },
                regexp: {
                    regexp: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/,
                    message:"El nombre del producto debe contener solamente letras."
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


    $('#nombre').keyup(function () {
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