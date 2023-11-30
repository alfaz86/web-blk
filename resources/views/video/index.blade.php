@extends('layouts.master')

@section('header')
    @include('layouts.breadcrumbs', [
        'page' => 'video',
        'title' => 'Video',
        'breadcrumbs' => ['Media & Informasi', 'Video']
    ])
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="mb-5">
                        {!! $helper::replaceIframeDimensions($video->embed_url, '100%', 220) !!}
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection