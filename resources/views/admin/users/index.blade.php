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
            <a href="#" onclick="CreateUser()" data-toggle="modal" data-target="#UserCreate"
                class="btn btn-sm btn-primary float-right">Create User</a>
            {{ $dataTable->table(['class' => 'table table-hover table-striped table-sm table-small table-bordered']) }}
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" id="UserCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">User Registration</h5>
                    <button type="button" class="btn-close btn btn-sm" data-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body" id="modalUserCreate">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("input, select").addClass("form-control");
        });

        function CreateUser() {
            $.ajax({
                type: "GET",
                url: "{{ route('Users.create') }}",
                beforeSend: function() {
                    html = "<center><img width='40px' height='40px' src='" +
                        "{{ asset('assets/images/gif/abc.gif') }}" +
                        "'/></center>";
                    html += '<h4 style="text-align:center">Processing...!</h4>';
                    $('.modal-body').html(html);
                },
                success: function(response) {
                    $("#modalUserCreate").empty();
                    $("#modalUserCreate").html(response);
                }
            });
        }
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
