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

@section('breadcrumbs', Breadcrumbs::render('personal.editar'))

@section('content')
<div class="container d-flex justify-content-center">
        <div class="card col-md-10 border-success">
            <h4 class="card-header text-center"><i class="fa fa-user-circle-o"></i>{{__('Editar Personal')}}
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
            <form action="{{ route('personal.editar',[ 'id' => $modelo->id])}}" id="form-editar" method="POST" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_completo" class="form-control-label">{{__('Nombre Completo')}}</label>
                            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" placeholder="Nombre Completo" value="{{old('nombre_completo')}}{{$modelo->nombre_completo}} ">
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido_paterno" class="form-control-label">{{__('Apellido Paterno')}}</label>
                                <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" value="{{old('apellido_paterno')}}{{$modelo->apellido_paterno}} ">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido_materno" class="form-control-label">{{__('Apellido Materno')}}</label>
                                <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" value="{{old('apellido_materno')}}{{$modelo->apellido_materno}} ">
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
    
@endsection