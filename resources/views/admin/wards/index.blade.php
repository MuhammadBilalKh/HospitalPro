@extends('layout.master')

@php($title = 'Manage Wards')

@section('title', $title)
@section('header', "List of Wards")

@section('breacrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => 'Wards List',
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ $title }}</h6>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('Wards.create') }}" class="btn btn-sm btn-primary float-right">Add Ward</a>
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-hover table-striped table-sm table-small table-bordered']) }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
