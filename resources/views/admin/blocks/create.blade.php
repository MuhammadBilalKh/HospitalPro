@extends('layout.master')

@section('title', 'Create Hospital Block')

@section('content')
    <h6 class="mb-4">Add Block</h6>
    @include('admin.blocks._form', [
        'action' => route('Blocks.store'),
        'block' => null,
        'type' => 'create',
    ])
@endsection
