
@extends('backend.layouts.master')

@section('title')
Role Page - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Role</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.jabatans.index') }}">Role</a></li>
                            <li class="breadcrumb-item active">List Role</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">List Role</h4>
                    </div><!-- end card header -->
                    <div class="card-body">


                        @include('backend.layouts.partials.messages')
                        <p class="float-right mb-2">
                            @if (Auth::guard('admin')->user()->can('role.create'))
                                <a class="btn btn-primary text-white" href="{{ route('admin.roles.create') }}">Create New Role</a>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            {{-- @include('backend.layouts.partials.messages') --}}
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th width="10%">Name</th>
                                        <th width="60%">Permissions</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($roles as $role)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $perm)
                                                {{-- <span class="badge badge-info mr-1"> --}}
                                                    {{ $perm->name }}
                                                {{-- </span> --}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                                            @endif
    
                                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                <a class="btn btn-danger text-white" href="{{ route('admin.roles.destroy', $role->id) }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                    Delete
                                                </a>
    
                                                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
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