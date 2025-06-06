<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware(['admin_guest'])->prefix('/admin/')->name('admin.')->group(function(){
    Route::get('login',[LoginController::class,'showLoginPage'])->name('login.page');
    Route::post('login',[LoginController::class,'login'])->name('login');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['admin_auth:admin'])->prefix('/admin/')->name('admin.')->group(function(){
   

    Route::get('logout',[DashboardController::class,'logout'])->name('logout');
});