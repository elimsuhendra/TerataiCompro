
@extends('backend.layouts.master')

@section('title')
Dashboard Page - Admin Panel
@endsection
@section('admin-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ @$title }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.homes.index') }}">{{ @$title }}</a></li>
                            <li class="breadcrumb-item active">List {{ @$title }}</li>
                        </ol>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @include('backend.layouts.partials.messages')
                        <h4 class="header-title float-left"> Dashboard Info</h4>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <div class="col-lg-8">
                                <div class="row">
                                    {{-- {{ dd($record) }} --}}
                                    @foreach ($record as $rows)
                                    {{-- {{ $rows }} --}}
                                    <div class="col-md-6 mt-5 mb-3">
                                        <div class="card">
                                            <div class="seo-fact sbg1">
                                                <a href="{{ route('admin.roles.index') }}">
                                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                                        <div class="seofct-icon"><i class="fa fa-users"></i> Jumlah Produk {{ $rows['nama_kategori'] }} (Aktif)</div>
                                                        <h2>{{ $rows['jumlah'] }}</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>    

                                    @endforeach
                                        
                                    {{-- <div class="col-md-6 mt-5 mb-3">
                                        <div class="card">
                                            <div class="seo-fact sbg1">
                                                <a href="{{ route('admin.roles.index') }}">
                                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                                        <div class="seofct-icon"><i class="fa fa-users"></i> Roles</div>
                                                        <h2>{{ $total_roles }}</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-md-5 mb-3">
                                        <div class="card">
                                            <div class="seo-fact sbg2">
                                                <a href="{{ route('admin.admins.index') }}">
                                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                                        <div class="seofct-icon"><i class="fa fa-user"></i> Admins</div>
                                                        <h2>{{ $total_admins }}</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-lg-0">
                                        <div class="card">
                                            <div class="seo-fact sbg3">
                                                <div class="p-4 d-flex justify-content-between align-items-center">
                                                    <div class="seofct-icon">Total Produks</div>
                                                    <h2>{{ $total_produk }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-lg-0">
                                        <div class="card">
                                            <div class="seo-fact sbg3">
                                                <div class="p-4 d-flex justify-content-between align-items-center">
                                                    <div class="seofct-icon">Unread Messages</div>
                                                    <h2>{{ $notifiacation }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Nama</th>
                                        <th width="10%">di Tambahkan</th>
                                        <th width="10%">Tanggal Ditambahkan</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>    

<!-- page title area start -->
{{-- <div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-md-6 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="{{ route('admin.roles.index') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-users"></i> Roles</div>
                                <h2>{{ $total_roles }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-md-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <a href="{{ route('admin.admins.index') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user"></i> Admins</div>
                                <h2>{{ $total_admins }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon">Permissions</div>
                            <h2>{{ $total_permissions }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div> --}}
@endsection