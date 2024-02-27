@extends('backend.layouts.master')

@section('title', 'Detail Jabatan - Admin Panel')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
    .custom-size {
    width: 70%;
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.homes.index') }}">{{ $title }}</a></li>
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
                            <div class="row gy-4 justify-content-center">
                                <div class="col-xxl-12 col-md-12 text-center ">

                                <img src="{{ asset('storage/images/' . $datas->image) }}" class="img-responsive img-thumbnail justify-content-center" alt="Cinque Terre" style="width:750px;height:auto;">
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <label for="nama_jabatan" class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $datas->name }} readonly">
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="created_by" class="form-label">Dibuat Oleh</label>
                                    <input type="text" class="form-control" id="created_by" value="{{ @$datas->account->name }} " readonly>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama_jabatan" class="form-label">Status</label>
                                    <input type="text" class="form-control"  value="{{ $datas->status }} " readonly>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="nama_jabatan" class="form-label">Tanggal Ditambahkan</label>
                                    <input type="text" class="form-control"  value="{{ $datas->created_at }} " readonly>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="created_by" class="form-label">Tanggal  Diedit Terakhir</label>
                                    <input type="text" class="form-control" id="created_by" value="{{ @$datas->updated_at }} " readonly>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="created_by" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="editor" name="deskripsi" rows="4" readonly>{{ $datas->description }}</textarea>
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
<script src="{{ asset('sidebackend/assets/js/ckeditor.js')}}"></script>

<script>
    ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
    console.error(error);
    });

    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection