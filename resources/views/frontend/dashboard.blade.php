@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('content')

    @include('frontend.includes.hero_slider', ['banners' => $banners])
    @include('frontend.includes.categories')
    @include('frontend.includes.ott')
    @include('frontend.includes.wifi_banner')
    
    @include('frontend.includes.new_releases')


    @include('frontend.includes.section_slider')
    @include('frontend.includes.top10', ['sections' => $sections])

    @include('frontend.includes.language')
    @include('frontend.includes.wifi_banner2')

@endsection
