@extends('layouts.template')
@section('styles')
<style>
    .form-group.has-danger .form-control-label
    {
        color: #f44336;
    }
</style>
@endsection
@section('breadcrumbs', Breadcrumbs::render('cargos.agregar'))

@section('content')
<div class="container d-flex justify-content-center">
<div class="card col-md-6">
    <h4 class="card-header text-center"><i class="fa fa-fire-extinguisher"></i>{{__('Agregar Cargo')}}
    </h4>
    <div class="card-body">
    <form action="{{ route('cargos.agregar') }}" id="form-agregar" method="POST" class="form-horizontal">
        @csrf
        <div class="form-group">
            <label for="cargo" class="form-control-label">{{__('Nombre del Cargo')}}</label>
            <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Nombre del Cargo" value="{{old('cargo')}}">
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <button id="btnSave"type="submit" class="btn btn-outline-primary">{{__('Guardar')}}</button>
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
    $('#form-agregar').formValidation({
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
                    message: 'La longitud máxima es de 255 caracteres!'
                },
                regexp: {
                    regexp: /^[A-Za-z\s]+$/,  
                    message:"Solo se permiten Letrás"
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
})();
</script>
@endsection 
    


