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
        .content-container > p {
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="container content-container">
                <img class="w-100" src="{{ $news->newsThumbnail->getUrl() }}" alt="{{ $news->newsThumbnail->file_name }}">
                <div class="py-4">
                    <h3 class="mb-2">{{ $news->title }}</h3>
                    <p class="m-0">{{ $helper::formatCreatedAt($news->created_at) }}</p>
                    <p class="m-0">Author {{ $news->user->name }}</p>
                </div>
                {!! $news->content !!}
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