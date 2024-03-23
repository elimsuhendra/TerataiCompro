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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#replyModal"> <!-- Added button with Bootstrap classes -->
                                <i class="bi bi-reply"></i> Balas <!-- Added Bootstrap icon -->
                            </button>
        
                        </div>
                                
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="nama_jabatan" class="form-label">Subjek Pesan</label>
                                    <input type="text" class="form-control" id="nama_jabatan" value="{{ $datas->subject }}" readonly>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $datas->nama }}" readonly>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $datas->email }}" readonly>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <label for="nama" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="editor" name="pesan" rows="4">{{ $datas->pesan }}</textarea>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <label for="created_at" class="form-label">Tanggal Pembuatan</label>
                                    <input type="text" class="form-control" id="created_at" value="{{ $datas->created_at }}" readonly>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <label for="updated_at" class="form-label">Tanggal Update</label>
                                    <input type="text" class="form-control" id="updated_at" value="{{ $datas->updated_at }}" readonly>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <label for="serial" class="form-label">Id Data</label>
                                    <input type="text" class="form-control" id="serial" value="{{ $datas->serial }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(count($replay) > 0)
        @foreach ($replay as $row )            
        <div class="row align-items-center justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Balas Pesan {{ $datas->subject }}</h4>
                        </div>
                                
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama_jabatan" class="form-label">Pesan di Kirim</label>
                                    <input type="text" class="form-control" id="nama_jabatan" value="{{ $row->created_at }}" readonly>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <label for="nama" class="form-label">To Email</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $datas->email }}" readonly>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <label for="nama" class="form-label">Deskripsi</label>
                                    <textarea class="form-control editor_all" id="editor_all" name="pesan" rows="4">{{ $row->pesan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</div>



<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Balas Pesan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.replayMessage') }}" method="POST">
            <div class="modal-body">
                <!-- Your form for sending a message goes here -->
                    @csrf
                    <input type="hidden" name="serial_kontak_kami" value="{{ $datas->serial }}">
                    <div class="form-group">
                        <label for="message">Pesan: {{ $datas->subject }}</label>
                        <textarea class="form-control" name="pesan" id="editor2" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
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

    ClassicEditor.create(document.querySelector("#editor2")).catch((error) => {
        console.error(error);
    });

    ClassicEditor.create(document.querySelector(".editor_all")).catch((error) => {
        console.error(error);
    });



    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection