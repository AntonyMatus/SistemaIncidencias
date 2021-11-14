@extends('layouts.template')

@section('styles')
<link href="{{ asset('css/efectos.css')}}" rel="stylesheet">
@endsection

@section('breadcrumbs', Breadcrumbs::render('reporte'))

@section('content')
    <div class="container d-flex justify-content-center">
            <div class="card col-md-11 border-primary">
                    <div class="card-header ">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                   
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                      <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                      <ul class="navbar-nav tabs">
                                        <li class="nav-item active">
                                          <a class="nav-link" href="#tab1">Reporte Diario <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" href="#tab2">Reporte Semanal</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" href="#tab3">Reporte Mensual</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab4">Reporte vehículo semanal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab5">Reporte vehículo mensual</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab6">Reporte Servicios Improcedentes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab7">Reporte Por Colonia</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </nav>
                    </div>
                    <div class="card-body secciones">
                            <article id="tab1">
                                <form action="{{route('reporte.generar')}}" method="POST" autocomplete="off">
                                    @csrf
                                <div class="form-group">
                                    <label for="data">{{__('SELECCIÓNA LA FECHA PARA GENERAR EL REPORTE')}} </label> &nbsp;
                                    <input type="date" name="date" id="date"> 
                                </div>   
                                <div class="form-group row">
                                        <div class="col-md-8 offset-md-5">
                                            <button type="submit" class="btn btn-success">Generar</button>
                                        </div>
                                    </div>
                                </form>
                                </article>
                                <article id="tab2">
                                    <form action="{{route('reporte.semanal')}}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateini">{{__('SELECCIÓNE INICIO DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateini" id="dateini"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateout">{{__('SELECCIÓNE FINAL DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateout" id="dateout"> 
                                                </div>  
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <div class="col-md-8 offset-md-5">
                                                <button type="submit" class="btn btn-success">Generar</button>
                                            </div>
                                    </div>

                                    </form>
                                </article>
                                <article id="tab3">
                                    <form action="{{route('reporte.mensual')}}" method="POST" autocomplete="off">
                                        @csrf
                                    <div class="form-group">
                                        <label for="datemes">{{__('SELECCIÓNA EL MES')}} </label> &nbsp;
                                        <input type="date" name="datemes" id="datemes"> 
                                    </div>   
                                    <div class="form-group row">
                                            <div class="col-md-8 offset-md-5">
                                                <button type="submit" class="btn btn-success">Generar</button>
                                            </div>
                                        </div>
                                    </form>
                                </article>

                                 <article id="tab4">
                                    <form action="{{route('reporte.vehiculo_semanal')}}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateini">{{__('SELECCIÓNE INICIO DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateini" id="dateini"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateout">{{__('SELECCIÓNE FINAL DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateout" id="dateout"> 
                                                </div>  
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <div class="col-md-8 offset-md-5">
                                                <button type="submit" class="btn btn-success">Generar</button>
                                            </div>
                                    </div>

                                    </form>
                                </article>
                                <article id="tab5">
                                    <form action="{{route('reporte.mensual_vehiculo')}}" method="POST" autocomplete="off">
                                        @csrf
                                    <div class="form-group">
                                        <label for="datemes">{{__('SELECCIÓNA EL MES')}} </label> &nbsp;
                                        <input type="date" name="datemes" id="datemes"> 
                                    </div>   
                                    <div class="form-group row">
                                            <div class="col-md-8 offset-md-5">
                                                <button type="submit" class="btn btn-success">Generar</button>
                                            </div>
                                        </div>
                                    </form>
                                </article>
                                <article id="tab6">
                                    <form action="{{route('reporte.improcedente_semanal')}}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateini">{{__('SELECCIÓNE INICIO DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateini" id="dateini"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateout">{{__('SELECCIÓNE FINAL DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateout" id="dateout"> 
                                                </div>  
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <div class="col-md-8 offset-md-5">
                                                <button type="submit" class="btn btn-success">Generar</button>
                                            </div>
                                    </div>
                                    </form>
                                </article>
                                <article id="tab7">
                                    <form action="{{route('reporte.colonia')}}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="justify-content-center">
                                            <label for="colonia" class="form-control-label">{{__('Colonia')}}</label>
                                             <select class="col-sm-6" name="colonia" id="colonia">
                                                 <option selected disabled>---Seleccione una Colonia</option>
                                                 @foreach (\Xhunter\Enumerable\Colonias::getAll() as $key => $value)
                                             <option value="{{old('colonia', $key)}}"> <label for="rado_{{$key}}">{{$value}}</label>
                                                 @endforeach
                                             </select>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateini">{{__('SELECCIÓNE INICIO DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateini" id="dateini"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateout">{{__('SELECCIÓNE FINAL DE LA SEMANA')}} </label> 
                                                    <input type="date" name="dateout" id="dateout"> 
                                                </div>  
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <div class="col-md-8 offset-md-5">
                                                <button type="submit" class="btn btn-success">Generar</button>
                                            </div>
                                    </div>
                                    </form>
                                </article>
                    </div>
                </div>
    </div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $('ul.tabs li a:first').addClass('active');
            $('.secciones article').hide();
            $('.secciones article:first').show();
    
            $('ul.tabs li a').click(function(){
                $('ul.tabs li a').removeClass('active');
                $(this).addClass('active');
                $('.secciones article').hide();
                var activeTab = $(this).attr('href');
                $(activeTab).show();
                return false;
            });
        });
    </script>
@endsection