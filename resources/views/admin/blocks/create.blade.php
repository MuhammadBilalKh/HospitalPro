@extends('layout.master')

@php($name = 'Create Hospital Block')

@section('title', $name)

@section('header', $name)

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'pageName' => 'Blocks Management',
        'module' => 'Create Blocks',
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">Register Block</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Import Blocks</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <p class="mb-0">
                        @include('admin.blocks._form', [
                            'action' => route('Blocks.store'),
                            'block' => null,
                            'type' => 'create',
                            'format' => 'register'
                        ])
                    </p>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <p class="mb-0">
                        @include('admin.blocks._form', [
                            'action' => route('Blocks.store'),
                            'block' => null,
                            'type' => 'create',
                            'format' => 'import'
                        ])
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
