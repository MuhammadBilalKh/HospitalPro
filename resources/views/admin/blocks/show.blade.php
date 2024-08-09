@extends('layout.master')

@php($pageName = $block->block_name)

@section('title', $pageName)

@section("header", $pageName)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'pageName' => "Blocks Management",
        'module' => $block->block_name
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ $block->block_name }}</h6>
    @include('admin.blocks._form', [
        'action' => '',
        'block' => $block,
        'type' => 'show',
    ])
@endsection
