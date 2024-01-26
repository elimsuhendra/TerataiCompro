
@extends('backend.layouts.master')

@section('title')
Admins - Kontak Kami List
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')


@section('admin-content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kategori</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.kategoris.index') }}">Kategori</a></li>
                            <li class="breadcrumb-item active">List Kategori</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">List Kategori</h4>
                    </div><!-- end card header -->
                    <div class="card-body">


                        @include('backend.layouts.partials.messages')
                        {{-- <h4 class="header-title float-left">Kategir List</h4> --}}
                        <p class="float-right mb-2">
                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                <a class="btn btn-primary text-white" href="{{ route('admin.kategoris.create') }}">Tambah Kategori Baru</a>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Nama Kategori</th>
                                        <th width="10%">Deskripsi</th>
                                        <th width="10%">Tanggal Ditambahkan</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($datas as $data)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        
                                        <td>

                                            @if (Auth::guard('admin')->user()->can('kategori.show'))
                                                <a class="btn btn-info text-white" href="{{ route('admin.kategoris.show', $data->serial) }}">Show</a>
                                            @endif
                                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                <a class="btn btn-success text-white" href="{{ route('admin.kategoris.edit', $data->serial) }}">Edit</a>
                                            @endif
                                            
                                            @if (Auth::guard('admin')->user()->can('admin.delete'))
                                            <a class="btn btn-danger text-white" href="{{ route('admin.kategoris.destroy', $data->serial) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->serial }}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $data->serial }}" action="{{ route('admin.kategoris.destroy', $data->serial) }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
    

                                   
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
</div>


<!-- page title area start -->
{{-- <div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Kategori</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Kategori</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div> --}}
<!-- page title area end -->
{{-- 
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @include('backend.layouts.partials.messages')
                    <h4 class="header-title float-left">Jabatan List</h4>
                    <p class="float-right mb-2">
                        @if (Auth::guard('admin')->user()->can('admin.edit'))
                            <a class="btn btn-primary text-white" href="{{ route('admin.jabatans.create') }}">Tambah Jabatan Baru</a>
                        @endif
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Nama Kategori</th>
                                    <th width="10%">Deskripsi</th>
                                    <th width="10%">Tanggal Ditambahkan</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($datas as $data)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $data->nama_kategori }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->created_at }}</td>

                                    <td>
                                        @if (Auth::guard('admin')->user()->can('admin.edit'))
                                            <a class="btn btn-success text-white" href="{{ route('admin.jabatans.edit', $data->serial) }}">Edit</a>
                                        @endif
                                        
                                        @if (Auth::guard('admin')->user()->can('admin.delete'))
                                        <a class="btn btn-danger text-white" href="{{ route('admin.admins.destroy', $data->serial) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->serial }}').submit();">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $data->serial }}" action="{{ route('admin.admins.destroy', $data->serial) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div> --}}
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
      
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection