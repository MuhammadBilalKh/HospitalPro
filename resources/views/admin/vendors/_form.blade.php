{!! html()->form('POST', $action)->open() !!}

@if ($type == 'edit')
    @method('PUT')
@endif

@php
    $days = array();
    for($a = 1; $a<=30; $a++){
        array_push($days, $a);
    }

    $cities = ["Karachi", "Hyderabad", "Larkana", "Dadu", "Badin", "Sukkur", "Islamabad", "Peshawar", "Multan", "Lahore", "Mirpurkhas", "Nausheroferoz"];
@endphp

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label("Vendor Name: ") !!}
            {!! html()->text("vendor_name")->class("form-control")->attribute("id", "txtVendorName")->value($vendor->vendor_name ?? old('vendor_name'))->attribute($type == 'show' ? "readonly" : "") !!}
            @error('vendor_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label("Contact Person Name: ") !!}
            {!! html()->text("contact_person")->class("form-control")->attribute("id", "txtContactPerson")->value($vendor->contact_person ?? old('contact_person'))->attribute($type == 'show' ? "readonly" : "") !!}
            @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label("Mobile Number: ") !!}
            {!! html()->text("mobile_number")->class("form-control")->attribute("id", "txtVendorMobileNumber")->value($vendor->mobile_number ?? old("mobile_number"))->attribute($type == 'show' ? "readonly" : "") !!}
            @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label("Email Address: ") !!}
            {!! html()->email("email")->class("form-control")->attribute("id", "txtVendorEmailAddress")->value($vendor->email ?? old('email'))->attribute($type == 'show' ? "readonly" : "") !!}
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label("Bank Name: ") !!}
            {!! html()->text("bank_name")->class("form-control")->attribute("id", "txtVendorBankName")->attribute($type == 'show' ? "readonly" : "")->value($vendor->bank_name ?? old('bank_name')) !!}
            @error('bank_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! html()->label("Account Number: ") !!}
            {!! html()->text("account_number")->class('form-control')->attribute("id", "txtAccountNumber")->value($vendor->account_number ?? old('account_number'))->attribute($type == 'show' ? "readonly" : "") !!}
            @error('account_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {!! html()->label("Select City: ") !!}
            {!! html()->select('city', $cities)->class('form-control')->attribute($type == 'show' ? "readonly" : "")->attribute('id', 'slctVendorCity')->value($vendor->city ?? old('city')) !!}
            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {!! html()->label('Delivery In Days: ') !!}
            {!! html()->select('delivery_days', $days)->attribute($type == 'show' ? "readonly" : "")->value($vendor->delivery_days ?? old('delivery_days'))->class('form-control select2') !!}
            @error('delivery_days')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            {!! html()->label('Address: ') !!}
            {!! html()->text('address')->class('form-control')->attribute("id", "txtAddress")->placeholder('Address')->attribute($type == 'show' ? 'readonly' : '')->value($vendor->address ?? old("address")) !!}
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            @if ($type == 'create')
                {!! html()->submit('Register')->class('btn btn-sm small btn-success') !!}
            @elseif($type == 'edit')
                {!! html()->submit('Update')->class('btn btn-sm small btn-primary') !!}
            @endif
            {!! html()->a()->attribute('href', route('Vendors.index'))->class('btn btn-sm small btn-danger')->text('Cancel') !!}
        </div>
    </div>
</div>

{!! html()->form()->close() !!}