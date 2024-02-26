
@extends('backend.layouts.master')

@section('title')
Admins - Contact Us List
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
                    <h4 class="mb-sm-0">Contact Us</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.kontakKami.index') }}">Contact Us</a></li>
                            <li class="breadcrumb-item active">List Contact Us</li>
                            <li class="breadcrumb-item active">Status: &nbsp; </li>

                            <li>
                                <select id="status-filter" class="breadcrumb-item active">
                                    <option value="">All</option>
                                    <option value="Active">Active</option>
                                    <option value="Non Active">Non-Active</option>
                                </select>
                            </li>
                            &nbsp;
                            <li class="breadcrumb-item active">Status Pesan: &nbsp; </li>

                            <li>
                                <select id="Read-filter" class="breadcrumb-item active">
                                    <option value="">All</option>
                                    <option value="Sudah Dibaca">Sudah Dibaca</option>
                                    <option value="Belum Dibaca">Belum Dibaca</option>
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
                        <h4 class="header-title float-left">Contact Us List</h4>
                        <p class="float-right mb-2">
                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                {{-- <a class="btn btn-primary text-white" href="{{ route('admin.kontakKami.create') }}">Tambah Data Baru</a> --}}
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Nama</th>
                                        <th width="10%">Email</th>
                                        <th width="10%">Subject</th>
                                        <th width="10%">status</th>
                                        <th width="10%">Status Pesan</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($datas as $data)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->subject }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            @if ($data->is_read == 0)
                                                Belum Dibaca
                                            @else   
                                                Sudah Dibaca
                                            @endif
                                        </td>
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('kontakKami.edit'))
                                                <a class="btn btn-info text-white" href="{{ route('admin.kontakKami.show', $data->serial) }}">Show</a>
                                            @endif

                                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                <a class="btn btn-success text-white" href="{{ route('admin.kontakKami.edit', $data->serial) }}">Edit</a>
                                            @endif
                                            
                                            @if (Auth::guard('admin')->user()->can('kontakKami.delete'))
                                            <a class="btn btn-danger text-white" href="{{ route('admin.kontakKami.destroy', $data->serial) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->serial }}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $data->serial }}" action="{{ route('admin.kontakKami.destroy', $data->serial) }}" method="POST" style="display: none;">
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

            // Filter the table based on selected status
            dataTable.column(4).search(selectedStatus === '' ? '' : '^' + selectedStatus + '$', true, false).draw();
        });
        $('#Read-filter').on('change', function () {
            var selectedRead = $(this).val();

            // Filter the table based on selected Read
            dataTable.column(5).search(selectedRead === '' ? '' : '^' + selectedRead + '$', true, false).draw();
        });

     </script>
@endsection