<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="" />
            </a>

            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                @if (auth()->user()->role == 'Admin')
                    {{-- MENU ADMIN --}}
                    <li class="nav-small-cap">
                        <span class="hide-menu">Home</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('HalamanDashboard') }}">
                            <i class="ti ti-atom"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)">
                            <div class="d-flex align-items-center gap-3">
                                <i class="ti ti-layout-grid"></i>
                                <span class="hide-menu">Laporan Harian</span>
                            </div>
                        </a>

                        <ul class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('HalamanAdminproject') }}">
                                    <i class="ti ti-circle"></i>
                                    <span class="hide-menu">Project</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <span class="sidebar-divider lg"></span>
                    </li>

                    <li class="nav-small-cap">
                        <span class="hide-menu">Master Data</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">
                            <i class="ti ti-user-circle"></i>
                            <span class="hide-menu">User Profile</span>
                        </a>
                    </li>
                @elseif (auth()->user()->role == 'Surveyor')
                    {{-- MENU KHUSUS SURVEYOR --}}
                    <li class="nav-small-cap">
                        <span class="hide-menu">Laporan Harian</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/admin_lapharian/1') }}">
                            <i class="ti ti-report"></i>
                            <span class="hide-menu">Laporan Harian</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
