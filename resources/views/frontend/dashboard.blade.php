@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('content')

    @include('frontend.includes.hero_slider', ['banners' => $banners])
    @include('frontend.includes.categories')
    @include('frontend.includes.ott')
    @include('frontend.includes.wifi_banner')

    

    @include('frontend.includes.language')
    @include('frontend.includes.wifi_banner2')

@endsection
