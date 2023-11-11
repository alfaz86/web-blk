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
                    <div class="subheader ">Registered users.</div>

                    <div class="h1 mb-3 ">132</div>

                    <div class="d-flex mb-2">
                        <div class="card-text ">868 more until next milestone.</div>
                    </div>

                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 13.2%" role="progressbar" aria-valuenow="13.2" aria-valuemin="0" aria-valuemax="100" aria-label="13.2% Complete">
                            <span class="visually-hidden">13.2% Complete</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="col-sm-6 col-lg-3">
            <div class="card mb-3  border-start-0 ">

                <div class="ribbon ribbon-top bg-danger ">
                    <i class="la la-bell fs-3"></i>
                </div>

                <div class="card-status-start bg-danger"></div>

                <div class="card-body">
                    <div class="subheader ">Articles.</div>

                    <div class="h1 mb-3 ">1031</div>

                    <div class="d-flex mb-2">
                        <div class="card-text ">Great! Don't stop.</div>
                    </div>

                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 80%" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" aria-label="80% Complete">
                            <span class="visually-hidden">80% Complete</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection