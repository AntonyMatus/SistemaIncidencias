@extends('layouts.template')

@section('breadcrumbs', Breadcrumbs::render('cargos.ver', $modelo->cargo))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-6">
        <h4 class="card-header text-center"><i class="fa fa-fire-extinguisher"></i>{{__('Ver Cargo')}}
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
            <div class="form-group text-center">
                <label for="cargo" class="form-control-label">{{__('Nombre del Cargo: ')}} &nbsp;&nbsp;&nbsp;{{$modelo->cargo}} </label>
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                   
                    <a href="{{ route('cargos.index') }}" class="btn btn-outline-success">{{__('Volver')}}</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    
@endsection