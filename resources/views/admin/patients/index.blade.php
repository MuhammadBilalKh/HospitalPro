@extends('layout.master')

@php($str = 'Patient Management')

@section('title', $str)

@section('header', 'Patient List')

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $str,
        'pageName' => 'Patient List',
    ])
@endsection

@section('content')
    <a href="{{ route('Patient.create') }}" class="btn btn-square btn-sm small btn-primary float-right">Register Patient</a>
    {{ $dataTable->table(['class' => 'table table-hover table-striped table-borderless']) }}
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
