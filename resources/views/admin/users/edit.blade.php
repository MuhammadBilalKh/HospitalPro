@extends('layout.master')

@section("title", "Edit User ".$user->name)

@section("header", "Edit User ".$user->name)

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "User Management",
        "pageName" => "Edit User ".$user->name
    ])
@endsection

@section('content')
    @include('admin.users._form',[
        'user' => $user,
        'action' => route('Users.update', $user->id),
        'type' => 'edit'
    ])
@endsection