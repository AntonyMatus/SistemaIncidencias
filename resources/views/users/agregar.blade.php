@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('usuarios.agregar'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Back</a>
        </div>
    </div>
</div>

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

<div class="col-md-6 offset-md-3">
    <form action="{{ route('usuarios.agregar') }}" class="form-horizontal" id="form-agregar" method="post" accept-charset="utf-8">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{{old('name')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="last_name" id="last_name" placeholder="Apellidos" class="form-control" value="{{old('last_name')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de Usuario:</strong>
                    <input type="text" name="username" id="username" placeholder="Nombre de Usuario" class="form-control" value="{{old('username')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" id="email" placeholder="correo electr??nico" class="form-control" value="{{old('email')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" id="password" placeholder="Contrase??a" class="form-control" value="{{old('password')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirmar Contrase??a" class="form-control" value="{{old('confirm-password')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    @foreach($roles as $value)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $value }}"
                        value="{{ $value }}" name="roles[]"
                        {{ in_array($value, old('roles', [])) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="{{ $value }}">{{ $value }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')

@endsection