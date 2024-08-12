@extends('layout.master')

@section("title", "Create User")

@section("header", "Create User")

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "User Management",
        "pageName" => "User Registration"
    ])
@endsection

@section('content')
    @include('admin.users._form',[
        'user' => null,
        'action' => route('Users.store'),
        'type' => 'create'
    ])
@endsection