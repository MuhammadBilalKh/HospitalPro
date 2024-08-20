@extends('layout.master')

@section('title', 'User Management')

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => 'User Management',
        'pageName' => 'User Registration',
    ])
@endsection

@section('header', "Register User")

@section('content')
    @include('admin.users._form', [
        'user' => null,
        'action' => route('Users.store'),
        'type' => 'create',
    ]);
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#txtMobileNumber").mask("0300 - 0000000");
            $("#txtCNIC").mask("00000 - 0000000 - 0");
            $(".alert").hide();
            $("#divProcess").hide();

            $("#ProfilePicture").on("change", function() {
                ShowPreview(this);
            });
        });

        function ShowPreview(imageFile) {
            if (imageFile.files && imageFile.files[0]) {
                let fileReader = new FileReader();

                fileReader.onload = function(e) {
                    $("#imgPreview").attr("src", e.target.result)
                }

                fileReader.readAsDataURL(imageFile.files[0]);
            }
        }
    </script>
@endpush
