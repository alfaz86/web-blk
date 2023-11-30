@extends('layouts.master')

@section('header')
    @include('layouts.breadcrumbs', [
        'page' => 'profile',
        'title' => 'Visi dan Misi',
        'breadcrumbs' => ['Profil', 'Visi dan Misi']
    ])
@endsection

@section('content')
<div class="container my-5">
    {!! $profile->vission_and_mission !!}
</div>
@endsection