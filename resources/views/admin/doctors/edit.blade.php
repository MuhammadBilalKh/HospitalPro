@extends('layout.master')

@php($name = "Doctors Management")

@section('title', $name)

@section('header', $name)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => $name,
        'pageName' => "Edit Doctor Detail"
    ])
@endsection

@section('content')
    @include('admin.doctors._form',[
        'action' => route('Doctor.update', $doctorData->id),
        'type' => "edit",
        'doctor' => $doctorData,
        'departments' => $departments
    ])
@endsection