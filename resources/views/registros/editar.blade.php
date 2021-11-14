@extends('layouts.template')
@section('style')
<link rel="stylesheet" href="{{asset('vendor/formvalidation/formValidation.css')}}">
@endsection

@section('breadcrumbs', Breadcrumbs::render('registros.editar'))

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card col-md-10 border-success">
        <h4 class="card-header text-center"><i class="fa fa-book"></i>{{__('Agregar Registro')}}
        </h4>
        <div class="card-body">
        <form action="{{ route('registros.editar', [ 'id' => $modelo->id])}}" id="form-agregar" method="POST" class="form-horizontal" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="personal_id" class="form-control-label">{{__('Personal al Mando ')}}</label>
                        <br>
                        <select class="form-control" name="personal_id" id="personal_id">
                            <option selected value="{{old('personal_id')}} " disabled>---Seleccione una opcion</option>
                            @forelse (Xhunter\Models\Personal::orderBy('nombre_completo')->get() as $item)
                            <option value="{{$item->id}}" @if (old('personal_id', $modelo->personal_id) === $item->id) selected @endif>{{$item->nombre_completo}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="vehiculo_unidad" class="form-control-label">{{__('Unidad(es)')}} </label>
                            <br>
                           @foreach (Xhunter\Models\Vehiculo::orderBy('vehiculo_unidad')->get() as $item)
                        <input type="checkbox" class="checkbox " name="vehiculo_unidad[]" value="{{$item->id}}"> &nbsp; {{$item->vehiculo_unidad}}
                        <br>
                           @endforeach 
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emergencias_id" class="form-control-label">{{__('Tipo de Emergencia')}}</label>
                        <br>
                        <select class="form-control" name="emergencias_id" id="emergencias_id">
                            <option value="{{old('emergencias_id')}} " selected disabled>---Seleccione una opcion</option>
                            @forelse (Xhunter\Models\Emergencia::orderBy('tipo_emergencia')->get() as $item)
                            <option value="{{$item->id}}" @if (old('emergencias_id', $modelo->emergencias_id) === $item->id) selected @endif>{{$item->tipo_emergencia}}</option>
                            @empty
                            @endforelse
                        </select>
                        <br>
                        <br>
                    <label for="tipo_servicio" class="form-control-label">{{__('Seleccione el Tipo de Servicio')}} </label>
                    <label for="tipo_servicio">
                    <input type="checkbox" name="tipo_servicio" id="tipo_servcio" value="{{old('tipo_servicio', "1")}}"> Servicio Improcedente
                    </label>
                    <label for="tipo_servicio">
                        <input type="checkbox" name="tipo_servicio" id="tipo_servcio" value="{{old('tipo_servicio', "2")}}"> Servicio Procedente
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_estaciones" class="form-control-label">{{__('SubEstacion')}}</label>
                            <div>
                                @foreach (\Xhunter\Enumerable\SubEstaciones::getAll() as $key => $value)
                                    <div class="radio-custom radio-primary form-control">
                                    <input type="radio" id="rado_{{$key}}" value="{{old('sub_estaciones')}} {{$key}}" name="sub_estaciones" @if (old('sub_estaciones',$modelo->sub_estaciones)== $key)checked @endif/>
                                    <label for="rado_{{$key}}">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emergencia" class="form-control-label">{{__('Emergencia')}}</label>
                        <br>
                    <textarea class="form-control rounded-0" name="emergencia" id="emergencia" rows="3" value="{{old('emergencia')}}">{{$modelo->emergencia}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="descripción_emergencia" class="form-control-label">{{__('Descripción de la Emergencia')}} </label>
                    <textarea class="form-control rounded-0" name="descripción_emergencia" id="descripción_emergencia" rows="3" value="{{old('descripción_emergencia')}}">{{$modelo->descripción_emergencia}} </textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dirección" class="form-control-label">{{__('Direccion')}}</label>
                        <br>
                        <label for="calle" class="form-control-label"> {{__('Calle:')}} </label>
                        <input type="text" name="calle" id="calle" value="{{old('calle', $modelo->calle)}}"> <br>
                        <label for="num" class="form-control-label">{{__('Num:')}}</label>
                        <input type="text" name="num" id="num" value="{{old('num', $modelo->num)}}" ><br>
                        <label for="entre_calle" class="form-control-label">{{__('Entre Calle:')}}</label>
                        <input type="text" name="entre_calle" id="entre_calle" value="{{old('entre_calle', $modelo->entre_calle)}}"><br>
                        <label for="colonia" class="form-control-label">{{__('Colonia')}}</label>
                        <select class="col-sm-10" name="colonia" id="colonia">
                            <option selected disabled>---Seleccione una Colonia</option>
                            @foreach (\Xhunter\Enumerable\Colonias::getAll() as $key => $value)
                        <option id="colonia" value="{{old('colonia', $key)}}"> <label for="rado_{{$key}}">{{$value}}</label>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="num_escoltas" class="form-control-label">{{__('Numero de Escoltas')}}</label>
                    <input type="number" class="form-control" name="num_escoltas" id="num_escoltas" value="{{old('num_escoltas', $modelo->num_escoltas)}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="personas_atendidas" class="form-control-label">{{__('Numero de Personas Atendidas')}}</label>
                        <input type="number" class="form-control" name="personas_atendidas" id="personas_atendidas" value="{{old('personas_atendidas', $modelo->personas_atendidas)}}">
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="hora_salida" class="form-control-label">{{__('Hora de Salida')}}</label>
                            <input type="time" class="form-control" name="hora_salida" id="hora_salida" value="{{old('hora_salida', $modelo->hora_salida)}}">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                            <label for="hora_retorno" class="form-control-label">{{__('Hora de Retorno')}}</label>
                            <input type="time" class="form-control" name="hora_retorno" id="hora_retorno" value="{{old('hora_retorno', $modelo->hora_retorno)}}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                            <label for="fecha_reporte" class="form-control-label">{{__('Fecha de Reporte')}}</label>
                            <input type="date" class="form-control" name="fecha_reporte" id="fecha_reporte" value="{{old('fecha_reporte', $modelo->fecha_reporte)}}">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button id="btnSave"type="submit" class="btn btn-outline-primary">{{__('Guardar')}}</button>
                    <a href="{{ route('registros.index') }}" class="btn btn-outline-success">{{__('Cancelar')}}</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection