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

        <li class="nav-item">
            <a class="nav-link" href="/cars">
                <span class="nav-icon cil-car-alt"></span>
                Транспорт
            </a>
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
