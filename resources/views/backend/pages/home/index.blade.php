
@extends('backend.layouts.master')

@section('title')
Admins - Produk List
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.homes.index') }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">List {{ $title }}</li>
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
                            @if (Auth::guard('admin')->user()->can('produks.create'))
                                <a class="btn btn-primary text-white" href="{{ route('admin.homes.create') }}">Tambah {{ $title }} </a>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
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
                                   @foreach ($datas as $data)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ @$data->name }}</td>
                                        <td>{{ @$data->account->name }}</td>
                                        <td>{{ @$data->created_at }}</td>
    
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('home.show'))
                                                <a class="btn btn-info text-white" href="{{ route('admin.homes.show', $data->serial) }}">Show</a>
                                            @endif

                                            @if (Auth::guard('admin')->user()->can('home.edit'))
                                                <a class="btn btn-success text-white" href="{{ route('admin.homes.edit', $data->serial) }}">Edit</a>
                                            @endif
                                            
                                            @if (Auth::guard('admin')->user()->can('home.delete'))
                                            <a class="btn btn-danger text-white" href="{{ route('admin.homes.destroy', $data->serial) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->serial }}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $data->serial }}" action="{{ route('admin.produks.destroy', $data->serial) }}" method="POST" style="display: none;">
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
      
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection