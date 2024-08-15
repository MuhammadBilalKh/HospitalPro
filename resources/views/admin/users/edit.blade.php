@extends('layout.master')

@section('title', 'User Management')

@section('breadcrumbs')
    @include('layout.breadcrumbs', [
        'module' => 'User Management',
        'pageName' => 'Update User ' . $user->name,
    ])
@endsection

@section('content')
    @include('admin.users._form', [
        'user' => $user,
        'action' => route('Users.update', $user->id),
        'type' => 'edit',
    ])
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
