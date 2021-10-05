<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminController;





Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth:admin']], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
    Route::resource('/role', RoleController::class);
});



Route::prefix('admin')->group(function () {
});