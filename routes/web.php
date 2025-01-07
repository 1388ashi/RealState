<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MortgageRentController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('login', [AuthController::class, 'login'])->name('admin.login');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::prefix('admin/')->name('admin.')->group(function () {
    Route::resource('sellings', SellingController::class);
    Route::resource('mortgage-rents', MortgageRentController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('types', TypeController::class);
    Route::resource('facilities', FacilitiesController::class);
    Route::patch('sellings/change-status/{id}', [SellingController::class,'changeStatus'])->name('sellings.changeStatus');
    Route::patch('mortgage-rents/change-status/{id}', [MortgageRentController::class,'changeStatus'])->name('mortgage-rents.changeStatus');
});
