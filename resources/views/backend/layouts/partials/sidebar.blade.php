 <!-- sidebar menu area start -->
 {{-- @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('cif.view') )
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            CIF
                        </span></a>
                        <ul class="collapse {{ Route::is('cif.view') ? 'in' : '' }}">
                            @if ($usr->can('borrower.view'))
                                <li class="{{ Route::is('admin.cif.index')  || Route::is('admin.cif.view') ? 'active' : '' }}"><a href="{{ route('admin.cif.index') }}">List CIF</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('kyc.view') )
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            KYC
                        </span></a>
                        <ul class="collapse {{ Route::is('kyc.view') ? 'in' : '' }}">
                            @if ($usr->can('borrower.view'))
                                <li class="{{ Route::is('admin.kyc.index')  || Route::is('admin.kyc.view') ? 'active' : '' }}"><a href="{{ route('admin.kyc.index') }}">List KYC</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('lendingFunding.view') )
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Pendanaan
                        </span></a>
                        <ul class="collapse {{ Route::is('lendingFunding.view') ? 'in' : '' }}">
                            @if ($usr->can('borrower.view'))
                                <li class="{{ Route::is('admin.lendingFunding.index')  || Route::is('admin.lendingFunding.view') ? 'active' : '' }}"><a href="{{ route('admin.lendingFunding.index') }}">List Pendanaan</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('borrower.view') ||  $usr->can('borrower.show'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Peminjam
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.borrower.view') ? 'in' : '' }}">
                            @if ($usr->can('borrower.view'))
                                <li class="{{ Route::is('admin.borrowers.index')  || Route::is('admin.borrowers.edit') ? 'active' : '' }}"><a href="{{ route('admin.borrowers.index') }}">Peminjam</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('company.create') || $usr->can('company.view') ||  $usr->can('company.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Perusahaan
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.company.create') || Route::is('admin.company.index') || Route::is('admin.company.edit') || Route::is('admin.company.show') ? 'in' : '' }}">
                            @if ($usr->can('company.view'))
                            <li class="{{ Route::is('admin.companies.index')  || Route::is('admin.companies.edit') ? 'active' : '' }}"><a href="{{ route('admin.companies.index') }}">Data Perusahaan</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('lending.create') || $usr->can('lending.view') ||  $usr->can('lending.edit') ||  $usr->can('lending.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Konfirmasi Pinjaman 
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.lending.create') || Route::is('admin.lending.index') || Route::is('admin.lending.edit') || Route::is('admin.lending.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('lending.view'))
                                <li class="{{ Route::is('admin.lendings.index')  || Route::is('admin.lending.edit') ? 'active' : '' }}"><a href="{{ route('admin.lendings.index') }}">List Pinjaman</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('borrowers.create') || $usr->can('borrowers.view') ||  $usr->can('borrowers.edit') ||  $usr->can('borrowers.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Peminjam 
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.borrowers.create') || Route::is('admin.borrowers.index') || Route::is('admin.borrowers.edit') || Route::is('admin.borrowers.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.borrowers.index')  || Route::is('admin.borrowers.edit') ? 'active' : '' }}"><a href="{{route('admin.borrowers.index') }}">List Peminjam</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('produk.create') || $usr->can('produk.view') ||  $usr->can('produk.edit') ||  $usr->can('produk.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Akses Pinjaman
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.produks.create') || Route::is('admin.produks.index') || Route::is('admin.produks.edit') || Route::is('admin.produks.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('produk.view'))
                                <li class="{{ Route::is('admin.produks.index')  || Route::is('admin.produks.edit') ? 'active' : '' }}"><a href="{{ route('admin.produks.index') }}">List produk</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('produkBej.view') ||  $usr->can('produkBej.show'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            produk
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.produkBej.view') ? 'in' : '' }}">
                            @if ($usr->can('produkBej.view'))
                                <li class="{{ Route::is('admin.produkBej.index')  || Route::is('admin.produkBej.edit') ? 'active' : '' }}"><a href="{{ route('admin.produkBej.index') }}">produk</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div> --}}

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
    
            @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                <li class="nav-item @if($currentRoute == 'admin.admins.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.admins.index') }}" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Admin</span>
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

            @if ($usr->can('jabatan.create') || $usr->can('jabatan.view') || $usr->can('jabatan.edit') || $usr->can('jabatan.delete'))
                <li class="nav-item @if($currentRoute == 'admin.jabatans.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.jabatans.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Jabatan</span>
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

            @if ($usr->can('optionmap.create') || $usr->can('optionmap.view') || $usr->can('optionmap.edit') || $usr->can('optionmap.delete'))
                <li class="nav-item @if($currentRoute == 'admin.optionmaps.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.optionmaps.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-widgets">Option Map</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('produk.list') || $usr->can('produk.view') || $usr->can('produk.edit') || $usr->can('produk.delete'))
                <li class="nav-item @if($currentRoute == 'admin.produks.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.produks.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-widgets">Produk</span>
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
                        <i class="bx bxs-user-account"></i> <span data-key="t-widgets">Kontak Bisnis</span>
                    </a>
                </li>
            @endif
            @if ($usr->can('optionMap.list') || $usr->can('optionMap.view') || $usr->can('optionMap.edit') || $usr->can('produk.delete'))
                <li class="nav-item @if($currentRoute == 'admin.optionMaps.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.optionMaps.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Option Map</span>
                    </a>
                </li>
            @endif    
            @if ($usr->can('produks.list') || $usr->can('produks.view') || $usr->can('produks.edit') || $usr->can('produks.delete'))
                <li class="nav-item @if($currentRoute == 'admin.produks.index') active @endif">
                    <a class="nav-link menu-link" href="{{ route('admin.produks.index') }}" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Produk</span>
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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Layouts</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-two-column.html" target="_blank" class="nav-link" data-key="t-two-column">Two Column</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts-vertical-hovered.html" target="_blank" class="nav-link" data-key="t-hovered">Hovered</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign In
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Pages</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="pages-starter.html" class="nav-link" data-key="t-starter"> Starter </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile" data-key="t-profile"> Profile
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProfile">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="pages-profile.html" class="nav-link" data-key="t-simple-page">
                                                Simple Page </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages-profile-settings.html" class="nav-link" data-key="t-settings"> Settings </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="pages-team.html" class="nav-link" data-key="t-team"> Team </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-timeline.html" class="nav-link" data-key="t-timeline"> Timeline </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-faqs.html" class="nav-link" data-key="t-faqs"> FAQs </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-pricing.html" class="nav-link" data-key="t-pricing"> Pricing </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-gallery.html" class="nav-link" data-key="t-gallery"> Gallery </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-maintenance.html" class="nav-link" data-key="t-maintenance"> Maintenance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-coming-soon.html" class="nav-link" data-key="t-coming-soon"> Coming Soon
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-sitemap.html" class="nav-link" data-key="t-sitemap"> Sitemap </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages-search-results.html" class="nav-link" data-key="t-search-results"> Search
                                    Results </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
