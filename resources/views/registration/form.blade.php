@extends('layouts.master')

@section('header')
    @include('layouts.breadcrumbs', [
        'page' => 'registration',
        'title' => 'Pendaftaran',
        'breadcrumbs' => ['Pendaftaran']
    ])
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title position-relative mb-4">
                    <h1 class="display-4">Form Pendaftaran</h1>
                </div>
                <div class="contact-form">
                    <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <input type="text" name="name" class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" required="required">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <input type="email" name="email" class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required="required">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <input type="text" name="number" class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('number') is-invalid @enderror" placeholder="No Telp" value="{{ old('number') }}" required="required">
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('address') is-invalid @enderror" rows="5" placeholder="Alamat" required="required">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Upload KTP</label>
                            <input type="file" accept="image/png, image/jpg, image/jpeg" name="ktp_image" class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('ktp_image') is-invalid @enderror" placeholder="Foto KTP" required="required" oninput="displayImage('ktp_image', 'ktp_image_display')">
                            <div id="ktp_image_display" class="my-3"></div>
                            @error('ktp_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Upload KK</label>
                            <input type="file" accept="image/png, image/jpg, image/jpeg" name="kk_image" class="form-control border-top-0 border-right-0 border-left-0 p-0 @error('kk_image') is-invalid @enderror" placeholder="Foto KK" required="required" oninput="displayImage('kk_image', 'kk_image_display')">
                            <div id="kk_image_display" class="my-3"></div>
                            @error('kk_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <style>
        .img-preview {
            max-width: 400px;
            width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('script')
    <script>
        function displayImage(inputName, displayId) {
            var input = document.getElementsByName(inputName)[0];
            var display = document.getElementById(displayId);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    display.innerHTML = '<img src="' + e.target.result + '" class="img-preview">';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection