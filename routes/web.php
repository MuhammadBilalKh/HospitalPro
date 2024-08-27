<?php

use App\Http\Controllers\{BlockController, DepartmentController, DoctorController, ItemController, PatientController, UserController, VendorController, WardController};
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'show_login_page'])->name('users.login');
Route::post('/login', [UserController::class, 'authentication_user'])->name('user.authenticate');

Route::middleware('is_user_login')->prefix("Admin")->group(function(){
    Route::get('/', [UserController::class, 'show_dashboard'])->name('users.dashboard');
    
    Route::resources([
        'Blocks' => BlockController::class,
        'Departments' => DepartmentController::class,
        'Users' => UserController::class,
        'Wards' => WardController::class,
        "Vendors" => VendorController::class,
        "Items" => ItemController::class,
        'Doctor' => DoctorController::class,
        'Patient' => PatientController::class,
    ]);

    Route::get('/Vendor/Ratings', [VendorController::class, "manage_reviews"])->name("vendors.manage_reviews");

    Route::get('/get_child_entries',[UserController::class, 'get_child_entries'])->name('users.get_child_entries');
    Route::post('/model_count/{model}', [UserController::class, 'get_model_count'])->name('users.get_model_count');

    Route::get('/logout', [UserController::class, 'logout'])->name('users.logout');
});

Route::fallback(function(){
    return view('not_found');
});