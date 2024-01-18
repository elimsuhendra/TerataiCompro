
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
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">CIF</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>CIF</span></li>
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
        <!-- data table start -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">      
                    <table class="table">

                        <tr>
                            <td>Dari Tangal :
                                <input type="date" class="form-control" placeholder="Dari Tanggal">
                            </td>
                            <td>Sampai Tangal :
                                <input type="date" class="form-control" placeholder="Sampai Tanggal">
                            </td>
                            <td>
                                Nama :
                                <input type="text" class="form-control" placeholder=" Cari Nama">
                            </td>    
                            <td>......
                                <input type="button" value="cari" name="search" class="btn btn-primary form-control">
                            </td>    

                        </tr>

                    </table>


                </div>    
            </div>    
        </div>

        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">            
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr class="h6">
                                    <th width="10%">Product Name</th>
                                    <th width="10%">Total Bayar</th>
                                    <th width="10%">Outstanding</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($pages['data'] as $data)
                               <tr>
                                    <td>{{ $data['product_name'] }}</td>
                                    <td>{{ $data['totalbayar'] }}</td>
                                    <td>{{ $data['outstading'] }}</td>
                                    <td>
                                        <a class="btn btn-primary shows" href="{{ route('admin.lendingFunding.show', $data['id']) }}">Detail</a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        {!! $pagination->links('backend.pages.custome') !!}
                    </div>

                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection




@section('scripts')
@endsection