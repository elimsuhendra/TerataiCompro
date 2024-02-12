
@extends('backend.layouts.master')

@section('title')
Admin Create - Admin Panel
@endsection

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
                    <h4 class="mb-sm-0">Kontak Kami</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.kontakKami.index') }}">Kontak Kami</a></li>
                            <li class="breadcrumb-item active">Tambah Data</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tambah Kontak Kami</h4>
                    </div><!-- end card header -->
                    <div class="card-body">

                        <form action="{{ route('admin.kontakKami.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tanggal Ditambahkan</label>
                                   
                                    <input type="text" class="form-control" id="name"  value=" {{ now() }}" readonly>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="email">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="pesan">Pesan</label>
                                    <textarea class="form-control" id="editor" name="pesan" rows="4"></textarea>
                                </div>
                            </div> 
    
                            
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                        </form>                  
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