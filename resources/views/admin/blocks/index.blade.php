@extends('layout.master')

@section('title', "Manage Blocks")

@section('content')
    <h6 class="mb-4">Manage Blocks</h6>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('Blocks.create') }}" class="btn btn-sm btn-primary float-right">Add Block</a>
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush