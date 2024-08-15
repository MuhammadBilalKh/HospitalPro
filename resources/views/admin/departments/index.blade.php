@extends('layout.master')

@php($title = 'Department Management')
@section('title', $title)

@section('layout.breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => 'Department List',
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ $title }}</h6>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('Departments.create') }}" class="btn btn-sm btn-primary float-right">Add Department</a>
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-hover table-striped table-bordered']) }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
