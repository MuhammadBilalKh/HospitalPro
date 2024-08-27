@extends('layout.master')

@php($name = "Doctors Management")

@section('title', $name)

@section('header', "Register Doctor")

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => $name,
        'pageName' => "Create Doctor"
    ])
@endsection

@section('content')
    @include('admin.doctors._form',[
        'action' => route('Doctor.store'),
        'type' => "create",
        'doctor' => null,
        'departments' => $departments
    ])
@endsection