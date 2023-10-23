<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\Doctor\DoctorController;
use App\Http\Controllers\admin\Patient\PatientController;

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
    Route::get('admim/doctor/{doctor}/edit', 'edit')->name('admin.doctor.edit');
    Route::patch('admin/doctor/{doctor}/details', 'update_details')->name('admin.doctor.details');
    Route::patch('admin/doctor/{doctor}/picture', 'update_picture')->name('admin.doctor.picture');
    Route::patch('admin/doctor/{doctor}/password', 'update_password')->name('admin.doctor.password');
    Route::delete('admin/doctor/{doctor}/destroy', 'destroy')->name('admin.doctor.destroy');
});

Route::controller(PatientController::class)->middleware(Authenticate::class)->group(function () {
    Route::get('admin/patients', 'index')->name('admin.patient');
    Route::get('admin/patient/create', 'create')->name('admin.patient.create');
    Route::patch('admin/patient/create', 'store');
    Route::get('admin/patient/{patient}/show', 'show')->name('admin.patient.show');
    Route::get('admim/patient/{patient}/edit', 'edit')->name('admin.patient.edit');
    Route::patch('admin/patient/{patient}/details', 'update_details')->name('admin.patient.details');
    Route::patch('admin/patient/{patient}/picture', 'update_picture')->name('admin.patient.picture');
    Route::patch('admin/patient/{patient}/password', 'update_password')->name('admin.patient.password');
    Route::delete('admin/patient/{patient}/destroy', 'destroy')->name('admin.patient.destroy');
});

