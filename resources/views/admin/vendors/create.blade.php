@extends('layout.master')

@php($title = "Vendor Management")

@section("title", $title)

@section("header", $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "$title",
        'pageName' => "Vendors Registration"
    ])
@endsection

@section('content')
    @include('admin.vendors._form',[
        'vendor' => null,
        'type' => 'create',
        'action' => route('Vendors.store')
    ])
@endsection

@push('script')

@endpush