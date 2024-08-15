@extends('layout.master')

@section('title', 'Manage Blocks')

@section('header', "Blocks List")

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'pageName' => "Blocks Management",
        'module' => "Manage Blocks"
    ])
@endsection

@section('content')
    <h6 class="mb-4">Manage Blocks</h6>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('Blocks.create') }}" class="btn btn-sm btn-primary float-right">Add Block</a>
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-hover table-striped table-bordered']) }}
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $(document).ready(function(){
        $("input, select").addClass("form-control")
    });
</script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush