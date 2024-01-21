
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
{{-- <div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admins</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Admins</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div> --}}
<!-- page title area end -->

<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Admin</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.jabatans.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active">List Admin</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">List Admin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">


                        @include('backend.layouts.partials.messages')
                        <p class="float-right mb-2">
                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Tambah Admin Baru</a>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th width="10%">Name</th>
                                        <th width="10%">Perusahaan</th>
                                        <th width="40%">Roles</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($admins as $admin)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->company }}</td>
                                        <td>
                                            @foreach ($admin->roles as $role)
                                                {{-- <span class="badge badge-info mr-1"> --}}
                                                    {{ $role->name }}
                                                {{-- </span> --}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                <a class="btn btn-success text-white" href="{{ route('admin.admins.edit', $admin->id) }}">Edit</a>
                                            @endif
                                            
                                            @if (Auth::guard('admin')->user()->can('admin.delete'))
                                            <a class="btn btn-danger text-white" href="{{ route('admin.admins.destroy', $admin->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: none;">
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

@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection