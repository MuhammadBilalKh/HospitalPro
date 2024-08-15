@extends('layout.master')

@php($title = 'Manage Departments')

@section('title', $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => 'Edit Department '.$department->name,
    ])
@endsection

@section('header', $title)

@section('content')
    <h6 class="mb-4">{{ 'Edit Department '.$department->name }}</h6>
    @include('admin.departments._form', [
        'action' => route('Departments.update', $department->id),
        'department' => $department,
        'blocks' => $blocks,
        'type' => 'edit',
    ])
@endsection

@push('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
