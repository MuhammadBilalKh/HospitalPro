<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\{Block, Department, User, Ward};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('admin.users.index');
    }

    public function create()
    {
        $user_create_form = view('admin.users.create');
        return $user_create_form;
    }

    public function store(Request $request)
    {
        $request->validate([
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
            "dob.date" => "Invald Date Format",
            "profile_picture.required" => "Profile Pic Is Mandatory"
        ]);

        if($request->hasFile("profile_picture")){
            $path = $request->file("profile_picture")->store("public");
        }

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

        return redirect()->route('Users.index')->with("user-success","User Created Successfully..");
    }

    public function show(string $id)
    {
        return view('admin.users.show',[
            'user' => User::findOrFail($id)
        ]);
    }

    
    public function edit(string $id)
    {
        return view('admin.users.edit',[
            'user' => User::findOrFail($id)
        ])->render();
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => "required",
            "login_name" => "required|unique:users,login_name,$id,id",
            "cnic" => "required|unique:users,cnic,$id,id",
            "mobile_number" => "required|unique:users,mobile_number,$id,id",
            "email" => "required|email|unique:users,email,$id,id",
            'address' => 'required',
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

        $user = User::where("id", $id)->update([
            'name' => $request->name,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'email' => $request->email,
            'status' => $request->status,
            'dob' => $request->dob
        ]);

        if($user){
            return redirect()->route('Users.index')->with("success",'User Updated Successfully..');
        }
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
        if(Auth::user() != null){
            return redirect()->route('users.dashboard');
        }

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
            if(Auth::user()->status == 0){
                Auth::logout();
                return redirect()->back()->with("error", "Your Account Status Is Inactive");
            }
            return redirect()->route('users.dashboard');
        } else {
            return redirect()->back()->with('error', "Invalid Login Name or Password.");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login');
    }

    public function show_dashboard()
    {
        $activeUsersCount = User::where('status', USER_ACTIVE)->count();
        $blocksCount = Block::count();
        $departmentsCount = Department::count();
        $wardsCount = Ward::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact("totalUsers","activeUsersCount", "blocksCount", "departmentsCount", "wardsCount"));
    }

    public function user_administration(){
        return view('admin.users.manage_administration',[
            'blocks' => Block::GetBlocksList()
        ]);
    }

    public function get_child_entries(Request $request){

        if($request->parent == "block"){
            return response()->json(['data' => Department::where('block_id', $request->parent_id)->pluck("department_name",'id')]);            
        }

        else if($request->parent == "department"){
            return response()->json(['data' => Ward::where('department_id', $request->parent_id)->pluck("name",'id')]);
        }
    }

    public function get_model_count(Request $request){
        return true;
    }
}
