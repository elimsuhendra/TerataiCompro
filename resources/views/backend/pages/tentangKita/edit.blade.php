
@extends('backend.layouts.master')

@section('title')
Artikel Edit - Admin Panel
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
                    <h4 class="mb-sm-0">{{ $title }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.artikels.index') }}">{{ $title }}</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Edit {{ $title }}</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        @include('backend.layouts.tentangKita.messages')
                        <form action="{{ route('admin.artikels.update', $data->serial) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="key">Nama</label>
                                    <input type="text" class="form-control" id="name" name="judul" placeholder="Judul" value="{{ $data->nama }}">
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <br>
                                <label for="category">Kategori </label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" class="">--</option>
                                    <option value="Visi" {{($data->category === 'Visi') ? 'Selected' : ''}}>Visi</option>
                                    <option value="Misi" {{($data->category === 'Misi') ? 'Selected' : ''}}>Misi</option>
                                    <option value="Tim Kami" {{($data->category === 'Tim Kami') ? 'Selected' : ''}}>Tim Kami</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <br>

                                <label for="image">Gambar Produk</label>
                                <input type="hidden" name="last_image"  id="last_image" value="{{@$data->image}}">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="pesan">Deskripsi</label>
                                <textarea class="form-control" id="editor" name="content" rows="4">{{ $data->description }}</textarea>
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