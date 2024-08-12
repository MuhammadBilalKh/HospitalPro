<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Block;
use App\Models\Department;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_create_form = view('admin.users.create')->render();
        return $user_create_form;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => "required",
            "login_name" => "required|unique:users,login_name",
            "cnic" => "required|unique:users,cnic",
            "mobile_number" => "required|unique:users,mobile_number",
            "email" => "required|email|unique:users,email",
            'address' => 'required',
            "profile_picture" => "required|file",
            "gender" => "required",
            "dob" => "required|date"
        ],[
            'name.required' => "Name is required",
            "login_name.required" => "Login Name is Required",
            "login_name.unique" => "Login Name Already Exist",
            "cnic.required" => "CNIC Is Required",
            "cnic.unique" => "This CNIC Already Exist",
            "mobile_number.required" => "Mobile No Is Mandatory",
            "email.required" => "Email Is Required",
            "email.unique" => "Email Address Is Required",
            "gender.required" => "Please Select Gender",
            "email.email" => "Invalid Email Format Provided",
            "dob.required" => "Select Date of Birth",
            "dob.date" => "Invald Date Format"
        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors()
            ]);
        }

        dd($request->files);
        $path = $request->file("profile_picutre")->store("public");

        $password = Str::random(8);
        $user = User::create([
            'name' => $request->name,
            'cnic' => $request->cnic,
            'login_name' => $request->login_name,
            'profile_picture' => $path,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => $password,
            'status' => 1,
            'dob' => $request->dob
        ]);

        if($user){
            return response()->json(['msg' => "User Created Successfully.."]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    public function show_login_page()
    {
        return view('auth.login');
    }

    public function authentication_user(Request $request)
    {
        $request->validate([
            'login_name' => "required",
            "password" => "required"
        ], [
            'login_name.required' => "Login Name is Required",
            'password.required' => 'Password Is Required Field'
        ]);

        $credentials = ['login_name' => $request->login_name, 'password' => $request->password];

        $authentication = Auth::attempt($credentials);

        if ($authentication) {
            return redirect()->route('users.dashboard');
        } else {
            return redirect()->back()->with('error', "Invalid Login Name or Password.");
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function user_administration(){
        return view('admin.users.manage_administration',[
            'blocks' => Block::GetBlocksList()
        ]);
    }

    public function get_child_entries(Request $request){

        if($request->parent == "block"){
            return response()->json(['data' => Department::where('block_id', $request->parent_id)->get()]);            
        }

        else if($request->parent == "department"){
            return response()->json(['data' => Ward::where('department_id', $request->parent_id)->get()]);
        }
    }
}
