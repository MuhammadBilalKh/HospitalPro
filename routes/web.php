<?php

use App\Http\Controllers\{BlockController, DepartmentController, UserController};
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'show_login_page'])->name('users.login');
Route::post('/login', [UserController::class, 'authentication_user'])->name('user.authenticate');

Route::middleware('is_user_login')->prefix("Admin")->group(function(){
    Route::get('/', [UserController::class, 'show_dashboard'])->name('users.dashboard');
    Route::resources([
        'Blocks' => BlockController::class,
        'Departments' => DepartmentController::class,
        'Users' => UserController::class,
    ]);
});