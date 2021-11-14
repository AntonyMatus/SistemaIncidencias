<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand">
    <img class="navbar-brand-full" src="/img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
    <img class="navbar-brand-minimized" src="/img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
    
    </ul>
    <ul class="nav navbar-nav ml-auto">
    <li class="nav-item dropdown">
    <a class="nav-link nav-link" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">
    <img class="img-avatar" src="{{ Auth::user()->getAvatarPath() }}" alt="admin@bootstrapmaster.com">
    </a>
    <div class="dropdown-menu dropdown-menu-right">
    <div class="dropdown-header text-center">
    <strong>Settings</strong>
    </div>
    <div class="dropdown-divider"></div>
    
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fa fa-lock"></i>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> {{ __('Logout') }}
    </a>
    </div>
    </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
    <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
    <span class="navbar-toggler-icon"></span>
    </button>
    </header>