<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'Blocks' => BlockController::class,
    'Departments' => DepartmentController::class,
]);