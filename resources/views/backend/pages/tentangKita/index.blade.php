
@extends('backend.layouts.master')

@section('title')
Admins - {{ $title }} List
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
                    <h4 class="mb-sm-0">{{ $title }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.optionMaps.index') }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">List {{ $title }}</li>
                            <li class="breadcrumb-item active">Status: &nbsp; </li>
                            <li>
                                {{-- <label for="status-filter" class="breadcrumb-item active">  Status:</label> --}}
                                <select id="status-filter" class="breadcrumb-item active">
                                    <option value="">All</option>
                                    <option value="Active">Active</option>
                                    <option value="Non Active">Non-Active</option>
                                </select>
                            </li>

                        </ol>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @include('backend.layouts.partials.messages')
                        <h4 class="header-title float-left">{{ $title }} List</h4>
                        <p class="float-right mb-2">
                            @if (Auth::guard('admin')->user()->can('artikel.create'))
                                <a class="btn btn-primary text-white" href="{{ route('admin.tentangKita.create') }}">Tambah Data Baru</a>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Nama</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Pembuat Artikel</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($datas as $data)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ @$data->account->name }}</td>
    
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('artikel.show'))
                                                <a class="btn btn-info text-white" href="{{ route('admin.tentangKita.show', $data->serial) }}">Show</a>
                                            @endif

                                            @if (Auth::guard('admin')->user()->can('artikel.edit'))
                                                <a class="btn btn-success text-white" href="{{ route('admin.tentangKita.edit', $data->serial) }}">Edit</a>
                                            @endif
                                            
                                            @if (Auth::guard('admin')->user()->can('artikel.delete'))
                                            <a class="btn btn-danger text-white" href="{{ route('admin.tentangKita.destroy', $data->serial) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->serial }}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $data->serial }}" action="{{ route('admin.tentangKita.destroy', $data->serial) }}" method="POST" style="display: none;">
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

        </div>
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
      
        var dataTable = $('#dataTable').DataTable({
            responsive: true
        });

        // Handle status filter change
        $('#status-filter').on('change', function () {
            var selectedStatus = $(this).val();
            dataTable.column(2).search(selectedStatus === '' ? '' : '^' + selectedStatus + '$', true, false).draw();
        });

     </script>
@endsection


