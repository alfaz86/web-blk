@extends('layouts.master')

@section('header')
    @include('layouts.header', ['page' => 'home'])
@endsection

@section('content')
<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{ asset('assets/template/img/courses-2.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Tentang kami</h6>
                    <h1 class="display-4">BLK Komunitas Ponpes Darul Falah</h1>
                </div>
                <p>Kami hadir sebagai respons terhadap pesatnya perkembangan teknologi informasi dan kebutuhan pelajar untuk mengembangkan keterampilan yang dibutuhkan dalam dunia kerja. Para pelajar dihadapkan pada tantangan untuk memenuhi kriteria seperti disiplin, tanggung jawab, kerjasama, dan rasa percaya diri, dimana tidak semua dapat dipelajari melalui kurikulum akademik saja. Oleh karena itu, program ini menjadi sarana penting untuk membantu pelajar mempersiapkan diri menghadapi dunia kerja.</p>
                <div class="row pt-3 mx-0">
                    <div class="col-3 px-0">
                        <div class="bg-success text-center p-4">
                            <div class="d-flex justify-content-center">
                                <h1 class="text-white" data-toggle="counter-up">10</h1>
                                <h1 class="text-white">+</h1>
                            </div>
                            <h6 class="text-uppercase text-white">Pelajar<span class="d-block">Ikutserta</span></h6>
                        </div>
                    </div>
                    <div class="col-3 px-0">
                        <div class="bg-primary text-center p-4">
                            <div class="d-flex justify-content-center">
                                <h1 class="text-white" data-toggle="counter-up">100</h1>
                                <h1 class="text-white">+</h1>
                            </div>
                            <h6 class="text-uppercase text-white">Intruksi<span class="d-block">Keterampilan</span></h6>
                        </div>
                    </div>
                    <div class="col-3 px-0">
                        <div class="bg-secondary text-center p-4">
                            <div class="d-flex justify-content-center">
                                <h1 class="text-white" data-toggle="counter-up">100</h1>
                                <h1 class="text-white">+</h1>
                            </div>
                            <h6 class="text-uppercase text-white">Peluang<span class="d-block">Kerja</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Courses Start -->
<div class="container-fluid px-0 py-5">
    <div class="row justify-content-center bg-image mx-0 mb-5">
        <div class="col-lg-6 py-5">
            <div class="bg-white p-5 my-5">
                <h1 class="text-center mb-4">Ayo daftar tunggu apa lagi?</h1>
                <form>
                    <div class="form-row">
                        <div class="col-8 mx-auto my-3">
                            <a href="{{ route('registration.form') }}" class="btn btn-primary btn-block py-3">Daftar sekarang</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mx-0 justify-content-center pt-5">
        <div class="col-lg-6">
            <div class="section-title text-center position-relative mb-4">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Video</h6>
                <h1 class="display-4">Video Terbaru</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($latestVideos as $video)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="mb-5">
                        {!! $helper::replaceIframeDimensions($video->embed_url, '100%', 220) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Courses End -->


<!-- News Start -->
<div class="container-fluid bg-image py-5" style="margin: 90px 0;">
    <div class="container">
        <div class="section-title text-center position-relative mb-5">
            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Berita</h6>
            <h1 class="display-4">Berita terbaru</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
            @foreach ($latestNews as $item)
                <div class="team-item">
                    <img style="width: 100%; height: 300px; object-fit: cover;" src="{{ $item->newsThumbnail->getUrl() }}" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">{{ $item->title }}</h5>
                        <p class="mb-2">Web Design & Development</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- News End -->


<!-- Contact Start -->
@include('components.contact')
<!-- Contact End -->
@endsection
