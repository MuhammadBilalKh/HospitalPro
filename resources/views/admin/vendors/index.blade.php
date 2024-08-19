@extends('layout.master')

@php($title = "Vendor Management")

@section("title", $title)

@section("header", $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "$title",
        'pageName' => "Vendors List"
    ])
@endsection

@section('content')
    
@endsection

@push('script')

@endpush