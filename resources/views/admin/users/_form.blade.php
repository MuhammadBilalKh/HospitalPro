{!! html()->form('POST', route('Users.store'))->attribute('enctype', 'multipart/form-data')->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="alert alert-success">

</div>

<div class="row">
    <div id="divProcess" class="col-sm-12"></div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! html()->label('Profile Picture: *') !!}
            {!! html()->file('profile_picture')->attribute("accept", "image/*")->attribute('id', 'ProfilePicture') !!}
            <span id="err_profile_picture" class="text-danger"></span>
        </div>
        <img src="" alt="User Profile Picture" id="imgPreview" />
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-3">
        <div class="for-group">
            {!! html()->label('Enter Login Name: ') !!}
            {!! html()->text('login_name')->class('form-control')->value($user->login_name ?? old('login_name'))->attribute('id', 'txtUserLoginName') !!}
            <span id="err_login_name" class="text-danger"></span>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Username: ') !!}
            {!! html()->text('name')->class('form-control')->value($user->name ?? old('name'))->attribute('id', 'txtUserName') !!}
            <span id="err_name" class="text-danger"></span>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Select Gender: ') !!}
            {!! html()->select('gender', [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ])->class('form-control select2')->placeholder('Select Gender')->attribute('id', 'slctGender') !!}
            <span id="err_gender" class="text-danger"></span>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Email Address: ') !!}
            {!! html()->email('email')->class('form-control')->value($user->email ?? old('email'))->attribute('id', 'txtEmailAddress') !!}
            <span id="err_email" class="text-danger"></span>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Mobile Number: ') !!}
            {!! html()->text('mobile_number')->class('form-control')->attribute('id', 'txtMobileNumber')->value($user->mobile_number ?? old('mobile_number')) !!}
            <span id="err_mobile_number" class="text-danger"></span>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('CNIC: ') !!}
            {!! html()->text('cnic')->class('form-control')->value($user->cnic ?? old('cnic'))->attribute('id', 'txtCNIC') !!}
            <span id="err_cnic" class="text-danger"></span>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label('Date of Birth: ') !!}
            {!! html()->date('dob')->class('form-control')->value($user->dob ?? old('dob')) !!}
            <span id="err_dob" class="text-danger"></span>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            {!! html()->label("Address: ") !!}
            {!! html()->text('address')->class('form-control')->value($user->address ?? old('address'))->attribute("id", 'txtAddress') !!}
            <span class="text-danger" id="err_address"></span>
        </div>
    </div>

    @if ($type == 'edit')
        <div class="col-sm-3">
            <div class="form-group">
                {!! html()->label('Status: ') !!}
                {!! html()->select('status', [
                        'Active' => 1,
                        'Inactive' => 0,
                    ])->class('form-control')->value($user->status ?? old('status'))->placeholder('Select Status') !!}
            </div>
        </div>
    @endif

    <div class="col-sm-2">
        <div class="form-group mt-2">
            @if ($type == 'create')
                {!! html()->submit('Submit')->class('btn small btn-sm btn-success') !!}
            @elseif($type == 'edit')
                {!! html()->submit('Update')->class('btn small btn-sm btn-primary') !!}
            @endif
        </div>
    </div>
</div>

{!! html()->form()->close() !!}
