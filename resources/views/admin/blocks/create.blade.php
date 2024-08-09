@extends('layout.master')

@php($name = 'Create Hospital Block')

@section('title', $name)

@section('header', $name)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'pageName' => "Blocks Management",
        'module' => "Create Blocks"
    ])
@endsection

@section('content')
    <h6 class="mb-4">Add Block</h6>
    @include('admin.blocks._form', [
        'action' => route('Blocks.store'),
        'block' => null,
        'type' => 'create',
    ])
@endsection
