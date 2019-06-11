@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('roles.editar'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Rol</h2>
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


<form action="{{ route('roles.editar', ['id' => $role->id]) }}" class="form-horizontal" id="form-editar" method="post">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
            <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{{old('name', $role->name)}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $item)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="{{ $item->name }}"
                    name="permission[]"
                    {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}
                    value="{{ $item->id }}">
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


@endsection