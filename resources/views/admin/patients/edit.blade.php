@extends('layout.master')

@php($str = 'Patient Management')

@section('title', $str)

@section('header', $str)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $str,
        'pageName' => 'Update Patient ' . $patient->patient_name,
    ])
@endsection

@section('content')
    @include('admin.patients._form', [
        'action' => route('Patient.update', $patient->id),
        'patient' => $patient,
        'type' => 'edit',
        'format' => 'registration',
        'doctorList' => $doctors
    ])
@endsection
