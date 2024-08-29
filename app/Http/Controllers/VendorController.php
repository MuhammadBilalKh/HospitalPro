<?php

namespace App\Http\Controllers;

use App\DataTables\VendorDataTable;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Karachi");
    }

    public function index(VendorDataTable $vendorDataTable)
    {
        return $vendorDataTable->render('admin.vendors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        $vendorValidatedData = $request->validate([
            'address' => "required",
            'contact_person' => "required|string",
            'vendor_name' => "required|string",
            'mobile_number' => "required|max:15|unique:vendors,mobile_number",
            'email' => "required|email|unique:vendors,email",
            'city' => "required|string",
            'bank_name' => "required",
            'account_number' => "required|unique:vendors,account_number",
            'is_return_policy_applicable' => "required"
        ], [
            'address.required' => "Vendor Address Is a Required Field"
        ]);

        $vendorValidatedData['user_id'] = Auth::user()->id;

        Vendor::create($vendorValidatedData);

        return redirect()->route('Vendors.index')->with("success-create", "Vendor Registered Successfully..");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.vendors.show', [
            'vendor' => Vendor::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.vendors.edit', [
            'vendor' => Vendor::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function manage_reviews()
    {
        return view('admin.vendors.reviews');
    }
}
