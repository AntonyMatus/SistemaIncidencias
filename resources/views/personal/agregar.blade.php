@extends('layouts.template')

@section('styles')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
<style>
    .form-group.has-danger .form-control-label
    {
        color: #f44336;
    }
</style>
@endsection

@section('breadcrumbs', Breadcrumbs::render('personal.agregar'))

@section('content')
<div class="container d-flex justify-content-center">
        <div class="card col-md-10 border-success">
            <h4 class="card-header text-center"><i class="fa fa-user-circle-o"></i>{{__('Agregar Personal')}}
            </h4>
            <div class="card-body">
             @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('personal.agregar') }}" id="form-agregar" method="POST" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_completo" class="form-control-label">{{__('Nombre Completo')}}</label>
                            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" placeholder="Nombre Completo" value="{{old('nombre_completo')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido_paterno" class="form-control-label">{{__('Apellido Paterno')}}</label>
                                <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" value="{{old('apellido_paterno')}}">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido_materno" class="form-control-label">{{__('Apellido Materno')}}</label>
                                <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" value="{{old('apellido_materno')}}">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido_materno" class="form-control-label">{{__('Seleccione Cargo')}}</label>
                            <br>
                            <select class="form-control" name="cargo_id" id="cargo_id">
                                <option value="{{old('cargo_id')}}" selected disabled><---Seleccione una Opción--></option>
                                @forelse ($Cargo as $item)
                                <option value="{{$item->id}} ">{{$item->cargo}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button id="btnSave"type="submit" class="btn btn-outline-primary">{{__('Guardar')}}</button>
                        <a href="{{ route('personal.index') }}" class="btn btn-outline-success">{{__('Cancelar')}}</a>
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
        nombre_completo: {
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
                    message:"El campo Cargo solo soporta letras Mayusculas, Minusculas y Espacios"
                }
            }
        },
        apellido_paterno: {
            validators: {
                notEmpty: {
                    message: 'El campo Apellido Paterno es requerido!.'
                },
                stringLength: {
                    max: 255,
                    message: 'La longitud máxima es de 255 caracteres!'
                },
                regexp: {
                    regexp: /^[A-Za-z\s]+$/,  
                    message:"El campo Cargo solo soporta letras Mayusculas, Minusculas y Espacios"
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
})();
</script>
    
@endsection