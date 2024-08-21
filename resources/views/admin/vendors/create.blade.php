@extends('layout.master')

@php($title = "Vendor Management")

@section("title", $title)

@section("header", "Vendors Registration")

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
    <script>
        $(document).ready(function(){
            $("#delivery_days").select2();
            $("#slctVendorCity").select2();
            $("#slctReturnPolicyApplicable").select2();

            $("#txtVendorMobileNumber").mask("0300 - 0000000");
        });
    </script>
@endpush