<?php

namespace App\Http\Controllers\doctor;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('doctor_id', '=', Auth::user()->doctor->id)->get();

        // foreach ($patients as $patient) {
        //     echo $patient->patient->user->name . "<br>";
        //     echo $patient->patient->user->email . "<br>";
        // };
        return view('doctor.appointments.index', [
            'appointments' => $appointments,

        ]);
    }
}
