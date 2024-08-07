{!! html()->form('POST', $action)->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! html()->label('Block Name: ') !!}
            {!! html()->text('block_name')->class('form-control')->value($block->name ?? '') !!}
            @error('block_name')
                <span class="text-danger text-sm ">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!! html()->label('Comments (if any): ') !!}
            {!! html()->text('comments')->class('form-control')->value($block->comments ?? '') !!}
        </div>
    </div>
    <div class="col-sm-3 mt-4">
        @if ($type == 'edit')
            {!! html()->submit('Update')->class('btn btn-sm btn-primary small') !!}
        @else
            {!! html()->submit('Save')->class('btn btn-sm btn-success small') !!}
        @endif
        <a href="{{ route('Blocks.index') }}" class="btn btn-danger btn-sm">Cancel</a>
    </div>
</div>

{!! html()->form()->close() !!}
