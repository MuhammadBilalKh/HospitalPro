{!! Html::form('POST', $action)->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Patient Name: ') !!}
            {!! Html::text('patient_name')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($patient->patient_name ?? '') !!}
            @error('patient_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Patient Father Name: ') !!}
            {!! Html::text('father_name')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($patient->father_name ?? '') !!}
            @error('father_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Age: ') !!}
            {!! Html::number('age')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($patient->age ?? '') !!}
            @error('age')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Select Gender: ') !!}
            {!! Html::select('gender', ['Male' => 'Male', 'Female' => 'Female'])->placeholder('Select Gender')->attribute('id', 'slctGender')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($patient->gender ?? '') !!}
            @error('gender')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Enter CNIC: ') !!}
            {!! Html::text('cnic')->class('form-control')->attribute('id', 'txtPatientCNIC')->attribute($type == 'show' ? 'readonly' : '')->value($patient->cnic ?? '') !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Mobile Number: ') !!}
            {!! Html::text('mobile_nuber')->attribute('id', 'txtPatientMobileNumber')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($patient->mobile_number ?? '') !!}
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            {!! Html::label('Select Doctor: ') !!}
            {!! Html::select('doctor_id', $doctorList)->class('form-control')->attribute('id', 'slctDoctorList')->value($patient->doctor_id ?? "")->placeholder('Select Doctor') !!}
        </div>
    </div>

    @if($type != 'create')
        <div class="col-sm-3">
            <div class="form-group">
                {!! Html::label("Registration DateTime: ") !!}
                {!! Html::text("created_at")->class("form-control")->value($patient->created_at)->attribute("readonly", "readonly") !!}
            </div>
        </div>
    @endif

    <div class="col-sm-12">
        <div class="form-group">
            {!! Html::label('Address: ') !!}
            {!! Html::text('address')->class('form-control')->attribute($type == 'show' ? 'readonly' : '')->value($patient->address ?? '') !!}
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4 mt-4">
        <div class="form-group">
            @if ($type == 'create')
                {!! Html::submit('Submit')->class('btn btn-sm small btn-success') !!}
            @elseif($type == 'edit')
                {!! Html::submit('Update')->class('btn btn-sm small btn-primary') !!}
            @endif

            <a href="{{ route('Patient.index') }}" class="btn btn-sm small btn-danger">Cancel</a>
        </div>
    </div>
</div>

{!! Html::form()->close() !!}

@push('script')
    <script>
        $(document).ready(function() {
            $("#slctGender").select2();
            $("#slctDoctorList").select2();
            $("#txtPatientCNIC").mask("00000 - 0000000 - 0");
            $("#txtPatientMobileNumber").mask("0300 - 0000000");
        });
    </script>
@endpush
