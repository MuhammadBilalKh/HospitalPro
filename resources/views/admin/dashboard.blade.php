@extends('layout.master')
@php($name = "Welcome Admin")

@section("title", "$name")

@section('header', "$name")

@section('breadcrumbs')
    @include('layout.breadcrumbs',[
        'module' => "Admin",
        'pageName' => "Dashboard"
    ])
@endsection

@section('content')
    <div class="row bg-transparent">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary daily-sales">
                <div class="card-block">
                    <h6 class="mb-4 text-white">Users</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <a href="{{ route('Users.index') }}">
                                <h3 class="f-w-300 d-flex text-white align-items-center m-b-0"><i class="feather icon-user-plus text-c-white f-30 m-r-10"></i><span id="lblTotalUsers"></span></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card bg-info daily-sales">
                <div class="card-block">
                    <h6 class="mb-4 text-white">Blocks</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <a href="{{ route('Blocks.index') }}">
                                <h3 id="lblTotalBlocks" class="f-w-300 d-flex text-white align-items-center m-b-0"><i class="feather icon-layers text-c-white f-30 m-r-10"></i>{{ $blocksCount }}</sup></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card bg-secondary daily-sales">
                <div class="card-block">
                    <h6 class="mb-4 text-white">Departments</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <a href="{{ route("Departments.index") }}">
                                <h3 id="lblTotalDepartments" class="f-w-300 d-flex text-white align-items-center m-b-0"><i class="feather icon-layers text-c-white f-30 m-r-10"></i>{{ $departmentsCount }}</sup></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card bg-warning daily-sales">
                <div class="card-block">
                    <h6 class="mb-4 text-white">Wards</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <a href="{{ route("Wards.index") }}">
                                <h3 id="lblTotalWards" class="f-w-300 d-flex text-white align-items-center m-b-0"><i class="feather icon-layers text-c-white f-30 m-r-10"></i>{{ $wardsCount }}</sup></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $("#lblTotalDepartments").html(RenderTypeCount("department"));
            $("#lblTotalBlocks").html(RenderTypeCount("block"));
            $("#lblTotalWards").html(RenderTypeCount("ward"));
            $("#lblTotalUsers").html(RenderTypeCount('user'));
        });

        function RenderTypeCount(model){
            $.ajax({
                type:"POST",
                headers:{
                    "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content"),
                },
                url:"{{ route('users.get_model_count',['model' => '_modelType']) }}".replace("_modelType", model),
                success:function(response){
                    console.log(response);
                }
            });
        }
    </script>
@endpush