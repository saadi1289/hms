<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\Doctor\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
        Route::get('register', 'register_view')->name('register');
        Route::post('register', 'register');
    });

    Route::middleware(Authenticate::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::middleware(Authenticate::class)->group(function () {
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::patch('details', 'update_details')->name('details');
        Route::patch('picture', 'update_picture')->name('picture');
        Route::patch('password', 'update_password')->name('password');
    });

});



Route::controller(DashboardController::class)->middleware(Authenticate::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
});

Route::controller(DoctorController::class)->middleware(Authenticate::class)->group(function () {
    Route::get('admin/doctors', 'index')->name('admin.doctor');
    Route::get('admin/doctor/create', 'create')->name('admin.doctor.create');
    Route::patch('admin/doctor/create', 'store');
    Route::get('admin/doctor/{doctor}/show', 'show')->name('admin.doctor.show');
    Route::get('admim/doctor/{doctor}/edit' , 'edit')->name('admin.doctor.edit');
    Route::patch('admim/doctor/{doctor}/edit' , 'update');
    Route::delete('admin/doctor/{doctor}/destroy', 'destroy')->name('admin.doctor.destroy');
});

