@extends('layout.master')

@php($title = 'Vendor Management')

@section('title', $title)

@section('header', $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => "$title",
        'pageName' => 'Vendors List',
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ $title }}</h6>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('Vendors.create') }}" class="btn btn-sm btn-primary float-right">Create Vendor</a>
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-hover table-striped table-sm table-small table-bordered']) }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
