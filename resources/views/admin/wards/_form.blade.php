{!! html()->form('POST', $action)->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

{!! html()->div()->class('row')->open() !!}

<div class="col-sm-4">
    <div class="form-group">
        {!! html()->label('Ward Name: ') !!}
        {!! html()->text('name')->class('form-control')->value($ward->name ?? '')->attribute($type == 'show' ? 'readonly' : '') !!}
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="col-sm-3" @if($type == 'edit' || $type == 'show') hidden @endif>
    <div class="form-group">
        {!! html()->label('Select Block: ') !!}
        {!! html()->select('blocks', $blocks ?? [])->attribute('id', 'slctBlocks')->class('form-control')->placeholder('Select Blocks') !!}
        <span id="blockResult"></span>
    </div>
</div>

<div class="col-sm-3" id="divDepartments">
    <div class="form-group">
        {!! html()->label('Select Department: ') !!}
        {!! html()->select('department_id', $departments ?? [])->attribute('id', 'slctDepartments')->class('form-control') !!}
        @error('department_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group">
        {!! html()->label('Comments (if any): ') !!}
        {!! html()->text('comments')->class('form-control')->attribute($type == 'show' ? 'readonly' : "") !!}
    </div>
</div>

<div class="col-sm-4" id="divButtons">
    <div class="form-group">
        @if ($type == 'create')
            {!! html()->submit('Submit')->class('btn btn-sm small btn-success') !!}
        @elseif($type == 'edit')
            {!! html()->submit('Update')->class('btn btn-sm small btn-primary') !!}
        @endif
        <a href="{{ route('Wards.index') }}" class="btn btn-sm btn-danger small">Cancel</a>
    </div>
</div>

{!! html()->div()->close() !!}

{!! html()->form()->close() !!}

@push('script')
@if ($type == 'create')
        <script>
            $(document).ready(function() {
                $("#slctBlocks").select2();
                $("#divDepartments").hide();
                $("#divButtons").hide();
                $("#blockResult").hide();

                $("#slctBlocks").on("change", function() {
                    let block_id = ($(this).val());

                    if (block_id != '' || block_id != null) {
                        $.ajax({
                            url: "{{ route('users.get_child_entries') }}",
                            type: "GET",
                            data: {
                                parent: "block",
                                parent_id: block_id
                            },
                            beforeSend: function() {
                                $("#blockResult").show();
                                $("#blockResult").addClass("text-primary").html("Please Wait.")
                            },
                            success: function(response) {
                                $("#blockResult").hide();
                                $("#divButtons").show();
                                $("#divDepartments").show();
                                let data = response.data;

                                if (data.length == undefined) {
                                    $("#slctDepartments").html("");
                                    $.each(data, function(departmentID, DepartmentName) {
                                        $("#slctDepartments").append($('<option></option>')
                                            .val(
                                                departmentID).text(DepartmentName));
                                    });

                                    $("#slctDepartments").select2();
                                } else {
                                    $("#slctDepartments").html('')
                                    $("#divButtons").hide();
                                }
                            }
                        });
                    } else {
                        $("#divDepartments").hide();
                        $("#divButtons").hide();
                    }
                })
            });
        </script>

    @else
        <script>
            $(document).ready(function(){
                $("#slctDepartments").select2();
            });
        </script>
@endif
@endpush
