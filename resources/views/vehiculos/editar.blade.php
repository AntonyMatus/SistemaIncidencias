@extends('layouts.template')

@section('styles')
    
@stop 

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user"></i> {{__('Agregar vehiculo')}}</h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
            <form action="{{ route('vehiculos.editar', [ 'id' => $modelo->id]) }}" id="form-editar" method="post" class="form-horizontal needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre del vehiculo</label>
                    <input type="text" class="form-control {{ $errors->has('vehiculo_unidad') ? ' is-invalid' : ''}}"
                    name="vehiculo_unidad" id="vehiculo_unidad" value="{{old('vehiculo_unidad', $modelo->vehiculo_unidad)}}" required>
                    @if ($errors->has('vehiculo_unidad'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('vehiculo_unidad') }}</strong>
                    </span>
                    @endif
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                        <a href="{{ route('vehiculos.index') }}" class="btn btn-default">{{__('Cancelar')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop 

@section('scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>
@endsection