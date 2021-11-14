<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link">
                <i class="nav-icon icon-speedometer"></i> Dashboard
                <span class="badge badge-info">NEW</span>
            </a>
        </li>

        <li class="nav-title">Módulos</li>
            @php
            $elementos = Config::get('dashboard.modulos');
            @endphp
            @foreach ($elementos as $index => $item)
            @can($item['grupo_ruta'].'.index')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="javascript:void(0);">
                        <i class="nav-icon {{$item['icon']}}"></i>&nbsp;{{$item['titulo']}}
                    </a>
                    <ul class="nav-dropdown-items">
                    @foreach ($elementos[$index]['submenu'] as $key => $modulo)
                        @can($modulo['ruta'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{route($modulo['ruta'])}}">
                                    <i class="{{$modulo['icon']}}"></i>&nbsp;{{$modulo['label']}}
                                </a>
                            </li>
                        @endcan
                    @endforeach
                    </ul>
                </li>
            @endcan
            @endforeach
        </li>
    </ul>
</nav>