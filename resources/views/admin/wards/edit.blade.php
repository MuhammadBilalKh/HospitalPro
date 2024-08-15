@extends('layout.master')

@php($title = 'Wards Management')

@section('title', $title)

@section('header', "'Edit Ward '.$ward->name)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => $title,
        'pageName' => 'Edit Ward '.$ward->name,
    ])
@endsection

@section('content')
    <h6 class="mb-4">{{ 'Edit Ward '.$ward->name }}</h6>
    @include('admin.wards._form',[
        'ward' => $ward,
        'type' => 'edit',
        'blocks' => [],
        'departments' => $departments,
        'action' => route('Wards.update', $ward->id)
    ])
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            
        });
    </script>
@endpush
