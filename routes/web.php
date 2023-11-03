<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\Doctor\DoctorController;
use App\Http\Controllers\doctor\DoctorCheckupController;
use App\Http\Controllers\doctor\DoctorPatientController;
use App\Http\Controllers\admin\Patient\PatientController;
use App\Http\Controllers\doctor\DoctorDashboardController;
use App\Http\Controllers\doctor\DoctorAppointmentController;
use App\Http\Controllers\patient\PatientDashboardController;
use App\Http\Controllers\patient\PatientAppointmentController;
use App\Http\Controllers\admin\appointmnet\AppointmentController;
use App\Http\Controllers\patient\PatientCheckupController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\DoctorAuthenticate;
use App\Http\Middleware\PatientAuthenticate;

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
////////////////////////////////////////////ADMIN SECTION////////////////////////////////////////////////////
Route::middleware(Authenticate::class)->group(function () {
    Route::middleware(AdminAuthenticate::class)->group(function () {
        Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('edit', 'edit')->name('edit');
            Route::patch('details', 'update_details')->name('details');
            Route::patch('picture', 'update_picture')->name('picture');
            Route::patch('password', 'update_password')->name('password');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
        });

        Route::controller(DoctorController::class)->group(function () {
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

        Route::controller(PatientController::class)->group(function () {
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

        Route::controller(AppointmentController::class)->group(function () {
            Route::get('admin/appointments', 'index')->name('admin.appointments');
            Route::get('admin/appointment/create', 'create')->name('admin.appointment.create');
            Route::patch('admin/appointment/create', 'store');
            Route::get('admin/appointment/{appointment}/show', 'show')->name('admin.appointment.show');
            Route::get('admin/appointment/{appointment}/edit', 'edit')->name('admin.appointment.edit');
            Route::patch('admin/appointment/{appointment}/edit', 'update');
            Route::delete('admin/appointment/{appointment}/destroy', 'destroy')->name('admin.appointment.destroy');
        });
    });



    //////////////////////////////DOCTOR SECTION/////////////////////////////////////////////////////////////////////


    Route::middleware(DoctorAuthenticate::class)->group(function () {

        Route::controller(DoctorProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('doctor/edit', 'edit')->name('doctor.edit');
            Route::patch('doctor/details', 'update_details')->name('doctor.details');
            Route::patch('doctor/picture', 'update_picture')->name('doctor.picture');
            Route::patch('doctor/password', 'update_password')->name('doctor.password');
        });

        Route::controller(DoctorDashboardController::class)->group(function () {
            Route::get('/doctor/dashboard', 'index')->name('doctor.dashboard');
        });
        Route::controller(DoctorPatientController::class)->group(function () {
            Route::get('doctor/patients', 'index')->name('doctor.patient');
            Route::get('doctor/patient/{patient}/show', 'show')->name('doctor.patient.show');
        });


        Route::controller(DoctorAppointmentController::class)->group(function () {
            Route::get('doctor/appointments', 'index')->name('doctor.appointments');
            Route::get('doctor/appointment/{appointment}/show', 'show')->name('doctor.appointment.show');
            Route::get('doctor/appointment/{appointment}/update/{status}', 'updateStatus')->name('doctor.appointment.updateStatus');
        });
        Route::controller(DoctorCheckupController::class)->group(function () {
            Route::get('doctor/checkup/{appointment}/create', 'create')->name('doctor.checkup.create');
            Route::patch('doctor/checkup/{appointment}/create', 'store');
        });
    });


    Route::middleware(PatientAuthenticate::class)->group(function () {

        Route::controller(PatientProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('patient/edit', 'edit')->name('patient.edit');
            Route::patch('patient/details', 'update_details')->name('patient.details');
            Route::patch('patient/picture', 'update_picture')->name('patient.picture');
            Route::patch('patient/password', 'update_password')->name('patient.password');
        });

        Route::controller(PatientDashboardController::class)->group(function () {
            Route::get('/patient/dashboard', 'index')->name('patient.dashboard');
        });

        Route::controller(PatientAppointmentController::class)->group(function () {
            Route::get('patient/appointments', 'index')->name('patient.appointments');
            Route::get('patient/appointment/create', 'create')->name('patient.appointment.create');
            Route::patch('patient/appointment/create', 'store');
            Route::get('patient/appointment/{appointment}/show', 'show')->name('patient.appointment.show');
            Route::get('patient/appointment/{appointment}/edit', 'edit')->name('patient.appointment.edit');
            Route::patch('patient/appointment/{appointment}/edit', 'update');
            Route::delete('patient/appointment/{appointment}/destroy', 'destroy')->name('patient.appointment.destroy');
        });

        Route::controller(PatientCheckupController::class)->group(function () {
            Route::get('patient/checkups', 'index')->name('patient.checkups');
        });
    });
});
