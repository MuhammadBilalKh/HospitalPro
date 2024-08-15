@extends('layout.master')

@php($title = 'Wards Management')

@section('title', $title)

@section('header', "Create Ward")

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => 'Create Ward',
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ "Add Hospital Ward" }}</h6>
    @include('admin.wards._form',[
        'ward' => null,
        'type' => 'create',
        'blocks' => $blocks,
        'action' => route("Wards.store")
    ])
@endsection
