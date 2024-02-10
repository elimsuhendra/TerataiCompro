
@php
$usr = Auth::guard('admin')->user();
$currentRoute = request()->route()->getName();

@endphp

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            @if ($usr->can('dashboard.view'))
                <li class="nav-item @if($currentRoute == 'admin.dashboard') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-apps">Dashboard</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('home.list'))
                <li class="nav-item @if($currentRoute == 'admin.homes.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.homes.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Home</span>
                    </a>
                </li>
            @endif
    
            @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                <li class="nav-item @if($currentRoute == 'admin.admins.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.admins.index') }}" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">User</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('kategori.create') || $usr->can('kategori.view') || $usr->can('kategori.edit') || $usr->can('kategori.delete'))
                <li class="nav-item @if($currentRoute == 'admin.kategoris.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.kategoris.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-widgets">Kategori</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('kontakKami.list') || $usr->can('kontakKami.view') || $usr->can('kontakKami.edit') || $usr->can('kontakKami.delete'))
                <li class="nav-item @if($currentRoute == 'admin.produks.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.kontakKami.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="bx bxs-user-account"></i> <span data-key="t-widgets">Kontak Kami</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('kontakBisnis.list') || $usr->can('kontakBisnis.view') || $usr->can('kontakBisnis.edit') || $usr->can('kontakBisnis.delete'))
                <li class="nav-item @if($currentRoute == 'admin.produks.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.kontakBisnis.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-widgets">Kontak Bisnis</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('produks.list') || $usr->can('produks.view') || $usr->can('produks.edit') || $usr->can('produks.delete'))
                <li class="nav-item @if($currentRoute == 'admin.produks.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.produks.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">Produk</span>
                    </a>
                </li>
            @endif  
            @if ($usr->can('artikel.list') || $usr->can('artikel.view') || $usr->can('artikel.edit') || $usr->can('artikel.delete'))
                <li class="nav-item @if($currentRoute == 'admin.artikels.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.artikels.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Artikel</span>
                    </a>
                </li>
            @endif  
            @if ($usr->can('aboutUs.list') || $usr->can('aboutUs.view') || $usr->can('aboutUs.edit') || $usr->can('aboutUs.delete'))
                <li class="nav-item @if($currentRoute == 'admin.tentangKita.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.tentangKita.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Tentang Kami</span>
                    </a>
                </li>
            @endif  
            @if ($usr->can('config.view'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Konfigurasi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                            @if ($usr->can('optionMap.list') || $usr->can('optionMap.view') || $usr->can('optionMap.edit') || $usr->can('produk.delete'))
                                <li class="nav-item @if($currentRoute == 'admin.optionMaps.index') active @endif">
                                    <a class="nav-link menu-link" href="{{ route('admin.optionMaps.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Option Map</span>
                                    </a>
                                </li>
                            @endif
                            @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
                                <li class="nav-item @if($currentRoute == 'admin.roles.index') active @endif">
                                    <a class="nav-link menu-link" href="{{ route('admin.roles.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Role</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

            @endif  
                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>


{{-- @if ($usr->can('jabatan.create') || $usr->can('jabatan.view') || $usr->can('jabatan.edit') || $usr->can('jabatan.delete'))
<li class="nav-item @if($currentRoute == 'admin.jabatans.index') active @endif">
    <a class="nav-link menu-link" href="{{ route('admin.jabatans.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
        <i class="ri-honour-line"></i> <span data-key="t-widgets">Jabatan</span>
    </a>
</li>
@endif --}}
