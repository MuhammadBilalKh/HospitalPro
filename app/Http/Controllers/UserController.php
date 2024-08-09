<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function show_login_page(){
        return view('auth.login');
    }

    public function authentication_user(Request $request){
        $request->validate([
            'login_name' => "required",
            "password" => "required"
        ],[
            'login_name.required' => "Login Name is Required",
            'password.required' => 'Password Is Required Field'
        ]);

        $credentails = ['login_name' => $request->login_name, 'password' => $request->password];

        $authentication = Auth::attempt($credentails);

        if($authentication){
            return redirect()->route('users.dashboard');
        }

        else {
            return redirect()->back()->with('error', "Invalid Login Name or Password.");
        }
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }
}
