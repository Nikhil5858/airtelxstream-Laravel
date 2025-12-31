@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('content')

    @include('frontend.includes.hero_slider', ['banners' => $banners])

@endsection
