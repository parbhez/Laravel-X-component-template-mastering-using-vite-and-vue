<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <x-logo></x-logo>

        <div class="sidebar-brand sidebar-brand-sm">
            {{-- <a href="{{route('home')}}"> --}}
            <a href="/dashboard">
                <b class="logo-icon">
                    <img src="/images/logo/logo-sm.png" height="50" width="50">
                </b>
            </a>
        </div>

        @php
            $current = url()->current();
            $current = explode('/', $current) ? explode('/', $current)[0] : '';
        @endphp

        <nav class="sidebar-nav">
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="nav-item active">
                    <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>

                <li class="nav-item @if ($current == 'departments') selected active @endif">
                    <a class="nav-link" href="{{ route('departments.index') }}">
                        <i class="far fa-building"></i>
                    </a>
                </li>

                <li class="menu-header">Course</li>
                <li class="nav-item active">
                    <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Course</span></a>
                </li>
            </ul>
        </nav>


        {{-- <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>

        </ul> --}}

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
