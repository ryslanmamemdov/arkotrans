<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        {{ config('app.name', 'Laravel') }}
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <li class="nav-item">
            <a class="nav-link" href="/">
                <span class="nav-icon cil-home"></span>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/drivers">
                <span class="nav-icon cil-people"></span>
                Водители
            </a>
        </li>
        <li class="nav-group"  aria-expanded="@if(Request::segment(1) === 'transport') true @else false @endif">
            <a class="nav-link nav-group-toggle" href="#">
                <span class="nav-icon cil-car-alt"></span>
                Транспорт
            </a>
            <ul class="nav-group-items" style="height:@if(Request::segment(1) === 'transport') auto @else 0 @endif;">
                <li class="nav-item"><a class="nav-link" href="/transport/cars"><span class="nav-icon"></span> Машины</a></li>
                <li class="nav-item"><a class="nav-link" href="/transport/trailers"><span class="nav-icon"></span> Прицепы</a></li>
                <li class="nav-item"><a class="nav-link" href="/transport/datatypes"><span class="nav-icon cil-settings"></span> Типы полей</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span class="nav-icon cil-account-logout"></span>
                {{ __('Logout') }}
            </a>
        </li>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>
