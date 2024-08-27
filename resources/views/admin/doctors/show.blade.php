@extends('layout.master')

@php($name = "Doctors Management")

@section('title', $name)

@section('header', $name)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => $name,
        'pageName' => "$doctorData->doctor_name"
    ])
@endsection

@section('content')
    @include('admin.doctors._form',[
        'action' => '',
        'type' => "show",
        'doctor' => $doctorData
    ])
@endsection