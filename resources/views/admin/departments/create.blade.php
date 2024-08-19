@extends('layout.master')

@php($title = 'Manage Departments')

@section('title', $title)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => 'Create Department',
    ])
@endsection

@section('header', $title)

@section('content')
    <h6 class="mb-4">{{ 'Create Department' }}</h6>
    @include('admin.departments._form', [
        'action' => route('Departments.store'),
        'department' => null,
        'blocks' => $blocks,
        'type' => 'create',
    ])
@endsection
