{!! html()->form('POST', $action)->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! html()->label('Department Name: ') !!}
            {!! html()->text('department_name')->class('form-control')->attribute('id', 'txtDepartmentName')->value($department->department_name ?? '')->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('department_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! html()->label('Select Block: ') !!}
            {!! html()->select('block_id', $blocks)->class('form-control')->attribute('id', 'slctDepartmentBlock')->value($department->block_id ?? '')->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('block_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            {!! html()->label('Comments (if any):') !!}
            {!! html()->text('comments')->class('form-control')->value($department->comments ?? '')->attribute('id', 'txtDepartmentComments')->attribute($type == 'show' ? 'readonly' : '') !!}
        </div>
    </div>
    <div class="col-sm-4">
        @if ($type == 'create')
            {!! html()->submit('Create')->class('btn btn-sm small btn-success') !!}
        @elseif($type == 'edit')
            {!! html()->submit('Update')->class('btn btn-sm small btn-primary') !!}
        @endif
        <a href="{{ route('Departments.index') }}" class="btn btn-sm small btn-danger">Cancel</a>
    </div>
</div>

{!! html()->form()->close() !!}

@push('script')
    <script>
        $(document).ready(function() {
            $("#slctDepartmentBlock").select2();
        });
    </script>
@endpush
