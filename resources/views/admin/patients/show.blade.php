@extends('layout.master')

@php($str = 'Patient Management')

@section('title', $str)

@section('header', $str)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $str,
        'pageName' => $patient->patient_name,
    ])
@endsection

@section('content')
    @include('admin.patients._form', [
        'action' => '',
        'patient' => $patient,
        'type' => 'show',
        'format' => 'registration',
        'doctorList' => $doctors
    ])
@endsection
