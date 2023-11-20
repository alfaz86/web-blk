@extends(backpack_view('blank'))

@php
    $breadcrumbs = [
        'Admin' => backpack_url('dashboard'),
        'Dashboard' => false,
    ];
@endphp

@section('content')
    <div section="before_content" class="row mt-3">

        <div class="col-sm-6 col-lg-3">
            <div class="card mb-3  border-start-0 ">

                <div class="ribbon ribbon-top bg-success ">
                    <i class="la la-user fs-3"></i>
                </div>

                <div class="card-status-start bg-success"></div>

                <div class="card-body">
                    <div class="subheader ">Total users.</div>

                    <div class="h1 mb-3 ">{{ $total_user }}</div>

                    <div class="d-flex mb-2">
                        <div class="card-text ">
                            <a href="{{ backpack_url('user') }}">Lihat user.</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="col-sm-6 col-lg-3">
            <div class="card mb-3  border-start-0 ">

                <div class="ribbon ribbon-top bg-info ">
                    <i class="la la-clipboard-list fs-3"></i>
                </div>

                <div class="card-status-start bg-info"></div>

                <div class="card-body">
                    <div class="subheader ">Total Pendaftar.</div>

                    <div class="h1 mb-3 ">{{ $total_registration }}</div>

                    <div class="d-flex mb-2">
                        <div class="card-text ">
                            <a href="{{ backpack_url('registration') }}">Lihat Semua Pendaftar.</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection