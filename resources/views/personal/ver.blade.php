@extends('layouts.template')
@section('breadcrumbs', Breadcrumbs::render('personal.ver', $modelo->nombre_completo))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-7 border-success">
        <h4 class="card-header text-center"><i class="fa fa-user-circle-o"></i>{{__('Ver Personal')}}
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre_completo" class="form-control-label">{{__('Nombre Completo: ')}}</label> {{$modelo->nombre_completo}}
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido_paterno" class="form-control-label">{{__('Apellido Paterno: ')}}</label> {{$modelo->apellido_paterno}}
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido_materno" class="form-control-label">{{__('Apellido Materno: ')}}</label> {{$modelo->apellido_materno}}
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellido_materno" class="form-control-label">{{__('Cargo: ')}}</label>    {{$modelo->cargo->cargo}}
                    </div>
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-md-7 offset-md-5">
                    <a href="{{ route('personal.index') }}" class="btn btn-outline-success">{{__('Volver')}}</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
