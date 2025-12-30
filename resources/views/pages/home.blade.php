@extends('layouts.app')

@section('content')
    <div class="space-y-0">
        {{-- Hero Section --}}
        @include('pages.home.hero')

        {{-- Brands/Partners --}}
        @include('pages.home.brands')

        {{-- Services Section --}}
        @include('pages.home.services')

        {{-- Products Showcase --}}
        @include('pages.home.products')

        {{-- Articles/Journal --}}
        @include('pages.home.articles')

        {{-- Photo Gallery --}}
        @include('pages.home.gallery')

        {{-- Final CTA / Contact --}}
        @include('pages.home.contact')
    </div>
@endsection
