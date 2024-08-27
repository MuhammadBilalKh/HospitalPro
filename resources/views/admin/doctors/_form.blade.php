{!! Html::form('POST', $action)->attribute('enctype', 'multipart/form-data')->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Html::label("Profile Pciture: ") !!}
            {!! Html::file("profile_picture")->class('form-control') !!}
            @error('profile_picture') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label('Login Name: ') !!}
            {!! Html::text('login_name')->class('form-control')->value($doctor->login_name ?? old('login_name')) !!}
            @error('login_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label('Password: ') !!}
            {!! Html::password('password')->class('form-control')->value($doctor->password ?? old('password')) !!}
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label('Confirm Password: ') !!}
            {!! Html::password('confirm_password')->class('form-control')->value(old('confirm_password')) !!}
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label('Doctor Name: ') !!}
            {!! Html::input('doctor_name')->class('form-control')->value($doctor->doctor_name ?? old('doctor_name')) !!}
            @error('doctor_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label("Select Gender: ") !!}
            {!! Html::select('gender', ["Male" => "Male", "Female" => "Female"])->class('form-control')->placeholder("Select Gender")->value($doctor->gender ?? old('gender')) !!}
            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label("Select Department: ") !!}
            {!! Html::select("department_id",  $departments)->class('form-control')->value($doctor->department_id ?? old("department_id"))->placeholder("Select Department: ")->attribute("id" ,"slctDepartment") !!}
            @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="for-group">
            {!! Html::label("CNIC: ") !!}
            {!! Html::text("cnic")->class('form-control')->value($doctor->cnic ?? old('cnic'))->attribute("id", "txtDoctorCNIC") !!}
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label("Email Address: ") !!}
            {!! Html::email("email_address")->class('form-control')->value($doctor->email_address ?? old("email_address")) !!}
            @error('email_address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            {!! Html::label("Mobile Number: ") !!}
            {!! Html::text("mobile_number")->class('form-control')->value($doctor->mobile_number ?? old("mobile_number"))->attribute("id", "txtDoctorMobileNumber") !!}
            @error("mobile_number") <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label("Medical License Number: ") !!}
            {!! Html::text("medical_license_number")->class("form-control")->value($doctor->medical_license_number ?? old('medical_license_number'))->attribute("id", "txtDoctorMedicalLicenseNumber") !!}
            @error('medical_license_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label("Enter Qualification: ") !!}
            {!! Html::text("qualification")->class('form-control')->value($doctor->qualification ?? old("quaification"))->attribute("id", "txtDoctorQualification") !!}
            @error('qualification') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label("Select Specialization: ") !!}
            {!! Html::select("specialization", SPECIALIZATIONS)->class('form-control')->value($doctor->specialization ?? old('specilization'))->attribute('id', "slctDoctorSpecialization") !!}
            @error('specialization') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label("Years of Experience: ") !!}
            {!! Html::number('years_of_experience')->class('form-control')->attribute("id", "txtDoctorYearsOfExperience")->value($doctor->years_of_experience ?? old('years_of_experience')) !!}
            @error('years_of_experience') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="for-group">
            {!! Html::label("Address: ") !!}
            {!! Html::text('address')->class('form-control')->value($doctor->address ?? old('address')) !!}
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-4 mt-4">
        <div class="form-group">
            @if ($type == 'create')
                {!! Html::submit('Submit')->class('btn btn-sm small btn-success') !!}
            @elseif($type == 'edit')
                {!! Html::submit('Update')->class('btn btn-sm small btn-primary') !!}
            @endif
            {!! Html::a()->attribute('href', route('Doctor.index'))->class('btn btn-sm small btn-danger')->text('Cancel') !!}
        </div>
    </div>
</div>

{!! Html::form()->close() !!}

@push('script')
    <script>
        $(document).ready(function(){
            $("#txtDoctorCNIC").mask("00000 - 0000000 - 0");
            $("#slctDoctorSpecialization").select2();
            $("#slctDepartment").select2();
            $("#txtDoctorMobileNumber").mask("0300 - 0000000");
        });
    </script>
@endpush