@extends('layouts.template')

@section('style')
<style>
    .card{
        margin-bottom: 1.875em;
        border-radius: 5px;
        padding: 0;
        border: 0px solid transparent;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
    }
    .stat-widget-five {
        min-height: 60px;
    }
    .stat-widget-five .stat-icon {
        font-size: 50px;
        line-height: 50px;
        position: absolute;
        left: 30px;
        top: 20px;
    }
    .flat-color-1 {
        color: #00c292;
    }
    .stat-widget-five .stat-content {
        margin-left: 100px;
    }
    .stat-widget-five .stat-text {
        color: #455a64;
        font-size: 20px;
    }
    .stat-widget-five .stat-heading {
        color: #99abb4;
        font-size: 14px;
    }
</style>
@endsection

@section('content')
    @php
    $elementos = Config::get('dashboard.modulos');
    @endphp
    <div class="row">
    @foreach ($elementos as $item)
        <div class="col-lg-3 col-md-6">
            <a class="card" style="text-decoration: none;" href="{{ route($item['grupo_ruta'].'.index') }}">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="{{$item['icon']}}"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{$item['titulo']}}</span></div>
                                <div class="stat-heading">{{$item['descripcion']}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    </div>
@endsection
