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
        <div class="container">
            <form action="{{ route('vehiculos.agregar') }}" id="form-agregar" method="POST" class="form-horizontal" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="imagen" class="form-control-label">{{__('Imagen del vehiculo')}}</label>
                        <input type="file" class="form-control" name="imagen" id="imagen" value="{{old('imagen')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="unidad" class="form-control-label">{{__('Unidad')}}</label>
                        <input type="text" class="form-control" name="vehiculo_unidad" id="vehiculo_unidad" value="{{old('vehiculo_unidad')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="No_serie" class="form-control-label">{{__('Numero de Serie')}}</label>
                        <input type="text" class="form-control" name="num_serie" id="num_serie" value="{{old('num_serie')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Inventario" class="form-control-label">{{__('Inventario')}}</label>
                        <input type="text" class="form-control" name="inventario" id="inventario" value="{{old('inventario')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="No_Motor" class="form-control-label">{{__('Numero del Motor')}}</label>
                        <input type="text" class="form-control" name="no_motor" id="no_motor" value="{{old('no_motor')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Marca" class="form-control-label">{{__('Marca')}}</label>
                        <input type="text" class="form-control" name="marca" id="marca" value="{{old('marca')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Modelo" class="form-control-label">{{__('Modelo')}}</label>
                        <input type="text" class="form-control" name="modelo" id="modelo" value="{{old('modelo')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Placas" class="form-control-label">{{__('Placas')}}</label>
                        <input type="text" class="form-control" name="placas" id="placas" value="{{old('placas')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Estado" class="form-control-label">{{__('Estado de la Unidad')}}</label>
                        @foreach ($Estatus as $estatus)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estatus_vehiculo" id="estatus_vehiculo" value="{{old('estatus_vehiculo')}} {{ $estatus}} ">
                                <label class="form-check-label" for="estatus_vehiculo">
                                  {{ $estatus}}
                                </label>
                              </div>
                          @endforeach
                    </div>
                </div>
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
        imagen: {
            validators: {
                notEmpty: {
                    message: 'La Imagen es un campo requerido.'
                },
                stringLength: {
                    max: 150,
                    message: 'La longitud máxima es de 150 caracteres!'
                },
                regexp: {
                    regexp: /\.(jpe?g|png|gif|bmp)$/i,  
                    message:"La imagen debe ser jpg, jpeg, png, gif."
                }
            }
        },
        num_serie: {
            validators: {
                notEmpty: {
                    message: 'El Numero de Serie es un campo requerido.'
                },
                stringLength: {
                    max: 8,
                    message: 'La longitud máxima es de 8 caracteres!'
                },
                regexp: {
                    regexp: /^[0-9a-zA-Z]+$/,  
                    message:"El Numero de Serie  Solo permite Mayusculas y Numeros"
                }
            }
        },

        inventario: {
            validators: {
                notEmpty: {
                    message: 'El inventario es un campo requerido.'
                },
                stringLength: {
                    max: 8,
                    message: 'La longitud máxima es de 8 caracteres!'
                },
                regexp: {
                    regexp: /^[0-9]+$/,  
                    message:"El Inventario solo permite Numeros"
                }
            }
        },
        no_motor: {
            validators: {
                notEmpty: {
                    message: 'El Numero del Motor es un campo requerido.'
                },
                stringLength: {
                    max: 8,
                    message: 'La longitud máxima es de 8 caracteres!'
                },
                regexp: {
                    regexp: /^[0-9a-zA-Z]+$/,  
                    message:"El Numero de Motor solo permite Letras y Numeros"
                }
            }
        },
        marca: {
            validators: {
                notEmpty: {
                    message: 'La Marca del Motor es un campo requerido.'
                },
                stringLength: {
                    max: 8,
                    message: 'La longitud máxima es de 8 caracteres!'
                },
                regexp: {
                    regexp: /^[A-Za-z0-9\s]+$/g,  
                    message:"La Marca de Motor solo permite Letras, Numeros y Espacios en blanco."
                }
            }
        },
        modelo: {
            validators: {
                notEmpty: {
                    message: 'El Modelo del vehiculo es un campo requerido.'
                },
                stringLength: {
                    max: 8,
                    message: 'La longitud máxima es de 8 caracteres!'
                },
                regexp: {
                    regexp: /^[0-9]+$/,  
                    message:"El Modelo del vehiculo solo permite numeros."
                }
            }

        },
        placas: {
            validators: {
                notEmpty: {
                    message: 'Las Placas del vehiculo es un campo requerido.'
                },
                stringLength: {
                    max: 6,
                    message: 'La longitud máxima es de 6 caracteres!'
                },
                regexp: {
                    regexp: /^[0-9a-zA-Z_-]+$/g,  
                    message:"Las Placas del vehiculo solo permite Letras, Numeros y guion bajo o guion. Ejemplo: CR-09-315!"
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


    $('#vehiculo_unidad').keyup(function () {
        let valor = $(this).val();
        if (valor != '')
        {
            let nuevoValor = valor.toUpperCase();
            $(this).val(nuevoValor);
        }
    });
    $('#num_serie').keyup(function () {
        let valor = $(this).val();
        if (valor != '')
        {
            let nuevoValor = valor.toUpperCase();
            $(this).val(nuevoValor);
        }
    });
    $('#inventario').keyup(function () {
        let valor = $(this).val();
        if (valor != '')
        {
            let nuevoValor = valor.toUpperCase();
            $(this).val(nuevoValor);
        }
    });
    $('#no_motor').keyup(function () {
        let valor = $(this).val();
        if (valor != '')
        {
            let nuevoValor = valor.toUpperCase();
            $(this).val(nuevoValor);
        }
    });
    $('#marca').keyup(function () {
        let valor = $(this).val();
        if (valor != '')
        {
            let nuevoValor = valor.toUpperCase();
            $(this).val(nuevoValor);
        }
    });
    $('#placas').keyup(function () {
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

