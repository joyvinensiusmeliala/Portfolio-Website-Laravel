@extends('frontend.layouts.header')

@section('content')

@include('frontend.pages.about')
@include('frontend.pages.education')
@include('frontend.pages.services')
@include('frontend.pages.skills')
@include('frontend.pages.portfolio')
@include('frontend.pages.experiences')
@include('frontend.pages.contact')

@endsection

@push('script')
    alert('frontend.layouts.navbar');
@endpush
