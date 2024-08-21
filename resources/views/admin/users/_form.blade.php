{!! Html::form('POST', $action)->attribute('enctype', 'multipart/form-data')->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="alert alert-success"></div>

<div class="row">
    <div id="divProcess" class="col-sm-12"></div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label('Profile Picture: *') !!}
            {!! Html::file('profile_picture')->attribute('accept', 'image/*')->attribute('id', 'ProfilePicture') !!}
            @error('profile_picture')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="container">
            <img alt="User Profile Picture" id="imgPreview" />
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-3">
        <div class="for-group">
            {!! Html::label('Enter Login Name: ') !!}
            {!! Html::text('login_name')->class('form-control')->value($user->login_name ?? old('login_name'))->attribute('id', 'txtUserLoginName')->attribute($type == 'edit' ? 'readonly' : '')->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('login_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Username: ') !!}
            {!! Html::text('name')->class('form-control')->value($user->name ?? old('name'))->attribute('id', 'txtUserName')->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Select Gender: ') !!}
            {!! Html::select('gender', [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ])->class('form-control')->placeholder('Select Gender')->attribute($type == 'show' ? 'readonly' : '')->attribute('id', 'slctGender')->value($user->gender ?? old('gender')) !!}
            @error('gender')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Email Address: ') !!}
            {!! Html::email('email')->class('form-control')->value($user->email ?? old('email'))->attribute($type == 'show' ? 'readonly' : '')->attribute('id', 'txtEmailAddress') !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Mobile Number: ') !!}
            {!! Html::text('mobile_number')->class('form-control')->attribute('id', 'txtMobileNumber')->value($user->mobile_number ?? old('mobile_number'))->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('mobile_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('CNIC: ') !!}
            {!! Html::text('cnic')->class('form-control')->value($user->cnic ?? old('cnic'))->attribute($type == 'show' ? 'readonly' : '')->attribute('id', 'txtCNIC') !!}
            @error('cnic')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Date of Birth: ') !!}
            {!! Html::date('dob')->class('form-control')->value($user->dob ?? old('dob'))->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('dob')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            {!! Html::label('Address: ') !!}
            {!! Html::text('address')->class('form-control')->value($user->address ?? old('address'))->attribute('id', 'txtAddress')->attribute($type == 'show' ? 'readonly' : '') !!}
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @if ($type == 'edit')
        <div class="col-sm-3">
            <div class="form-group">
                {!! Html::label('Status: ') !!}
                {!! Html::select('status', [
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])->class('form-control')->attribute('id', 'slctUserStatus')->value($user->status ?? old('status'))->placeholder('Select Status')->attribute($type == 'show' ? 'readonly' : '') !!}
            </div>
        </div>
    @endif

    <div class="col-sm-3">
        <div class="form-group mt-4">
            @if ($type == 'create')
                {!! Html::submit('Submit')->class('btn small btn-sm btn-success') !!}
            @elseif($type == 'edit')
                {!! Html::submit('Update')->class('btn small btn-sm btn-primary') !!}
            @endif
            <a href="{{ route('Users.index') }}" class="btn btn-sm btn-danger small">Cancel</a>
        </div>
    </div>
</div>

{!! Html::form()->close() !!}

@if ($type != 'show')
    @push('script')
        <script>
            $(document).ready(function() {
                $("#slctGender").select2();
                $("#slctUserStatus").select2();
            });
        </script>
    @endpush
@endif
