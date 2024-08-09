@extends('layout.master')
@php($name = "Welcome Admin")

@section("title", "$name")

@section('header', "$name")

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "Admin",
        'pageName' => "Dashboard"
    ])
@endsection