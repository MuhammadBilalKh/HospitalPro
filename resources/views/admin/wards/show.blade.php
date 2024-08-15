@extends('layout.master')

@php($title = 'Wards Management')

@section('title', $title)

@section('header', $ward->name)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => $ward->name,
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ $ward->name }}</h6>
    @include('admin.wards._form',[
        'ward' => $ward,
        'type' => 'show',
        'blocks' => [],
        'departments' => $departments,
        'action' => ''
    ])
@endsection
