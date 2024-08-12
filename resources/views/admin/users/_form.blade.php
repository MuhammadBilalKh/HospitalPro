{!! html()->form('POST', route('Users.store'))->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! html()->label('Profile Picture: *') !!}
            {!! html()->file('profile_picture') !!}
            @error('profile_picture')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Username: ') !!}
            {!! html()->text('name')->class('form-control')->value($user->name ?? '') !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Email Address: ') !!}
            {!! html()->email('email')->class('form-control')->value($user->email ?? '') !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('CNIC: ') !!}
            {!! html()->text('cnic')->class('form-control')->value($user->cnic ?? '') !!}
            @error('cnic')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group mt-4">
            @if ($type == 'create')
                {!! html()->submit('Submit')->class('btn small btn-sm btn-success') !!}
            @else
                {!! html()->submit('Update')->class('btn small btn-sm btn-primary') !!}
            @endif
            <a href="{{ route('Users.index') }}" class="btn small btn-sm btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! html()->form()->close() !!}
