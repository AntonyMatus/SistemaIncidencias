@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('roles.agregar'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar Rol</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
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
<form action="{{ route('roles.agregar') }}" class="form-horizontal" id="form-agregar" method="post">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{{old('name')}}"/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('Permisos:')}}</strong><br>
                @foreach($permission as $index => $item)
                    @php
                        $aux = $index;
                    @endphp
                    @if (($aux % 5) === 0)
                        {{ Str::before(Str::title($item->name), '.index') }}
                    @endif
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $item->name }}"
                        value="{{ $item->id }}" name="permission[]"
                        {{ in_array($item->id, old('permission', [])) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="{{ $item->name }}">{{ $item->display_name }}</label>
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