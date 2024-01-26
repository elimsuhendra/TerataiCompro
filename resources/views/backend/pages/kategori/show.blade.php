@extends('backend.layouts.master')

@section('title', 'Detail Jabatan - Admin Panel')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.jabatans.index') }}">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Detail {{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama_jabatan" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_jabatan" value="{{ $datas->nama_kategori }}">
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $datas->deskripsi }}">
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="created_at" class="form-label">Tanggal Pembuatan</label>
                                    <input type="text" class="form-control" id="created_at" value="{{ $datas->created_at }}">
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="updated_at" class="form-label">Tanggal Update</label>
                                    <input type="text" class="form-control" id="updated_at" value="{{ $datas->updated_at }}">
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="serial" class="form-label">Id Data</label>
                                    <input type="text" class="form-control" id="serial" value="{{ $datas->serial }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection