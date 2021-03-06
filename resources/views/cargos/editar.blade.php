@extends('layouts.template')
@section('style')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
@endsection

@section('breadcrumbs', Breadcrumbs::render('cargos.editar'))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-6 border-success mb-3">
        <h4 class="card-header text-center"><i class="fa fa-fire-extinguisher"></i>{{__('Editar Cargo')}}
        </h4>
        <div class="card-body">
        <form action="{{ route('cargos.editar', [ 'id' => $modelo->id]) }}" id="form-editar" method="POST" class="form-horizontal" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="cargo" class="form-control-label">{{__('Nombre del Cargo')}}</label>
                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Nombre del Cargo"
                value="{{old('cargo', $modelo->cargo)}} ">
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button id="btnSave" type="submit" class="btn btn-outline-primary">{{__('Guardar')}}</button>
                    <a href="{{ route('cargos.index') }}" class="btn btn-outline-success">{{__('Cancelar')}}</a>
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
        cargo: {
            validators: {
                notEmpty: {
                    message: 'El campo Cargo es requerido!.'
                },
                stringLength: {
                    max: 255,
                    message: 'La longitud m??xima es de 255 caracteres!'
                },
                regexp: {
                    regexp: /^[A-Za-z\s]+$/,
                    message:"Solo se permiten Letr??s"
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
    $('#cargo').keyup(function () {
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