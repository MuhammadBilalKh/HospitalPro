@extends('layout.master')

@php($pageName = "Edit ".$block->block_name)

@section('title', $pageName)

@section('header', $pageName)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'pageName' => "Blocks Management",
        'module' => "Edit ".$block->block_name
    ])
@endsection

@section('content')
    <h6 class="mb-4">Edit {{ $block->block_name }}</h6>
    @include('admin.blocks._form', [
        'action' => route('Blocks.update', $block->id),
        'block' => $block,
        'type' => 'edit',
        'format' => 'register'
    ])
@endsection
