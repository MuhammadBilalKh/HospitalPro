@extends('layout.master')

@php($name = 'User Management')

@section('title', "$name")

@section('header', "$name")

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => "$name",
        'pageName' => 'Users List',
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ $name }}</h6>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('Users.create') }}"
                class="btn btn-sm btn-primary float-right">Create User</a>
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-hover table-striped table-sm table-small table-bordered']) }}
                </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("input, select").addClass("form-control");
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
