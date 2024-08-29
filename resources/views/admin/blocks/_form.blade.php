{!! Html::form('POST', $action)->attribute("enctype", "multipart/form-data")->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    @if ($format == 'register')
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
    @endif

    @if($format == 'import')
        <div class="col-sm-6">
            <div class="form-group">
                {!! Html::label("Upload CSV: ") !!}
                {!! Html::file("block_csv")->class('form-control') !!}
            </div>
        </div>
        <div class="col-sm-3 mt-4">
            {!! Html::submit("Upload")->class("btn btn-sm small btn-info") !!}
            <a href="{{ route('Blocks.index') }}" class="btn btn-danger btn-sm">Cancel</a>
        </div>
        <div class="col-sm-1 mt-4">
            <a href="{{ asset('ImportBlocks.csv') }}" download class="btn btn-sm small btn-warning">DOWNLOAD TEMPLATE</a>
        </div>
    @endif
</div>

{!! Html::form()->close() !!}
