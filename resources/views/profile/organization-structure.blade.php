@extends('layouts.master')

@section('header')
    @include('layouts.breadcrumbs', [
        'page' => 'profile',
        'title' => 'Struktur Organisasi',
        'breadcrumbs' => ['Profil', 'Struktur Organisasi']
    ])
@endsection

@section('content')
<div class="container my-5">
    <img class="w-100" src="{{ $profile->organizationalStructureImage->getUrl() }}" alt="{{ $profile->organizationalStructureImage->file_name }}">
</div>
@endsection