{!! Html::form('POST', $action)->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label('Block Name: ') !!}
            {!! Html::text('block_name')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($block->block_name ?? old('block_name')) !!}
            @error('block_name')
                <span class="text-danger text-sm ">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!! Html::label('Comments (if any): ') !!}
            {!! Html::text('comments')->class('form-control')->value($block->comments ?? '')->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('comments')
                <span class="text-danger text-sm ">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-3 mt-4">
        @if ($type == 'edit')
            {!! Html::submit('Update')->class('btn btn-sm btn-primary small') !!}
        @elseif($type == 'create')
            {!! Html::submit('Save')->class('btn btn-sm btn-success small') !!}
        @endif
        <a href="{{ route('Blocks.index') }}" class="btn btn-danger btn-sm">Cancel</a>
    </div>
</div>

{!! Html::form()->close() !!}
