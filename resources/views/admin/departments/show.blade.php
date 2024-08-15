@extends('layout.master')

@php($title = 'Manage Departments')

@section('title', $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => $department->name,
    ])
@endsection

@section('header', $title)

@section('content')
    <h6 class="mb-4">{{ $department->name }}</h6>
    @include('admin.departments._form', [
        'action' => '',
        'department' => $department,
        'blocks' => $blocks,
        'type' => 'show',
    ])
@endsection

@push('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
