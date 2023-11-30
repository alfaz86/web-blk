@extends('layouts.master')

@section('header')
    @include('layouts.breadcrumbs', [
        'page' => 'hubungi kami',
        'title' => 'Hubungi kami',
        'breadcrumbs' => ['Hubungi Kami']
    ])
@endsection

@section('content')
    @include('components.contact')
@endsection