@extends('layout.master')

@php($title = "Vendor Management")

@section("title", $title)

@section("header", $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "$title",
        'pageName' => "Edit Vendor ".$vendor->vendor_name
    ])
@endsection

@section('content')
    @include('admin.vendors._form',[
        'vendor' => $vendor,
        'type' => 'edit',
        'action' => route('Vendors.update', $vendor->id)
    ])
@endsection

@push('script')

@endpush