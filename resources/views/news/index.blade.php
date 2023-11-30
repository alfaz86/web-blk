@extends('layouts.master')

@section('header')
    @include('layouts.breadcrumbs', [
        'page' => 'news',
        'title' => 'Berita',
        'breadcrumbs' => ['Media & Informasi', 'Berita']
    ])
@endsection

@section('style')
    <style>
        .max-line {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .text-title {
            font-weight: bold;
            cursor: pointer;
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="team-item mb-3">
                                <img style="width: 100%; height: 200px; object-fit: cover;" src="{{ $item->newsThumbnail->getUrl() }}" alt="{{ $item->newsThumbnail->file_name }}">
                                <div class="bg-light text-center py-4 px-2">
                                    <a class="mb-2 max-line text-title" href="{{ route('news.page.detail', $item->slug) }}">{{ $item->title }}</a>
                                    <p class="m-0">{{ $helper::formatCreatedAt($item->created_at) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div style="background-color: rgba(22, 104, 219, 0.875)" class="mb-3">
                    <div class="container py-2">
                        <p class="text-white p-0 m-0">Berita terbaru</p>
                    </div>
                </div>
                <div class="bg-light d-flex flex-column justify-content-center p-3">
                    @foreach ($latestNews as $item)
                        <div class="d-flex align-items-center mb-5">
                            <img style="width: 80px; height: 80px; object-fit: cover;" src="{{ $item->newsThumbnail->getUrl() }}" alt="{{ $item->newsThumbnail->file_name }}">
                            <div class="ml-2 mt-n1">
                                <a class="max-line text-title" href="{{ route('news.page.detail', $item->slug) }}">{{ $item->title }}</a>
                                <p class="m-0">{{ $helper::formatCreatedAt($item->created_at) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection