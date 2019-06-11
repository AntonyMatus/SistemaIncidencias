@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('vehiculos.editar'))

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-car"></i> {{__('Agregar vehiculo')}}</h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
            <form action="{{ route('vehiculos.editar', [ 'id' => $modelo->id]) }}" id="form-editar" method="POST" class="form-horizontal" >
                @csrf
                <div class="form-group">
                    <label for="nombre">Unidad del vehiculo</label>
                    <input type="text" class="form-control"
                    name="vehiculo_unidad" id="vehiculo_unidad" value="{{old('vehiculo_unidad', $modelo->vehiculo_unidad)}}" required>
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
                    message: 'El formato no es el correcto.'
                },
                regexp: {
                    regexp:  /^[A-Z]{1}-[\d]{1,3}$/, 
                    message:"1ra letra Mayuscula, seguido de un -, seguido de 3 digitos."
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