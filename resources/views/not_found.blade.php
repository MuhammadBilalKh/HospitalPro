@extends('layout.master')

@php($title = 'Resource Not Found')

@section('title', $title)

@section('header', $title)

@section('breadcrumbs')

    @include('layout.breadcrumbs', [
        'module' => 'Not Found',
        'pageName' => 'Error 404',
    ])

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h6 class="text-danger">{{ __("The Requested Resource Does Not Exist..") }}</h6>
        </div>
    </div>
@endsection
