<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminController;





Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('/user', AdminController::class);
    Route::get('/dashboard', [AdminController::class, 'dasboard'])->name('admin_dashboard');
    Route::resource('/role', RoleController::class);
    Route::get('/module',    [RoleController::class, 'module_create'])->name('module.create');
    Route::post('/module',    [RoleController::class, 'module_store'])->name('module.store');
});



Route::prefix('admin')->group(function () {
});