@extends('layout.master')

@php($name = "Doctors Management")

@section('title', $name)

@section('header', $name)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => $name,
        'pageName' => "Doctor's List"
    ])
@endsection

@section('content')
    <a href="{{ route('Doctor.create') }}" class="btn btn-sm small btn-primary float-right">Register Doctor</a>
    {!! $dataTable->table(['class' => "table table-hover table-striped table-bordered"]) !!}
@endsection

@push('script')
    {!! $dataTable->scripts() !!}
@endpush