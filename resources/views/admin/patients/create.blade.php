@extends('layout.master')

@php($str = "Patient Management")

@section('title', $str)

@section('header', "Patient Registration")

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => $str,
        'pageName' => "Patient Registration"
    ])
@endsection

@section('content')
    @include('admin.patients._form',[
        'action' => route('Patient.store'),
        'patient' => null,
        'type' => 'create',
        'format' => "registration",
        'doctorList' => $doctors
    ])
@endsection

@push('script')

@endpush