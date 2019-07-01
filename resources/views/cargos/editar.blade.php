@extends('layouts.template')
@section('style')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
<style>
    .form-group.has-danger .form-control-label
    {
        color: #f44336;
    }
</style>
@endsection

@section('breadcrumbs', Breadcrumbs::render('cargos.editar'))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-6 border-success mb-3">
        <h4 class="card-header text-center"><i class="fa fa-fire-extinguisher"></i>{{__('Editar Cargo')}}
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
        <form action="{{ route('cargos.editar', [ 'id' => $modelo->id]) }}" id="form-editar" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="cargo" class="form-control-label">{{__('Nombre del Cargo')}}</label>
                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Nombre del Cargo" value="{{old('cargo')}}{{$modelo->cargo}} ">
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
    
@endsection