<?php

namespace App\Http\Controllers\doctor;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorPatientController extends Controller
{
    public function index()
    {
        $patients = Appointment::where('doctor_id', '=', Auth::user()->doctor->id)
            ->select('patient_id') // Select only the 'patient_id' column
            ->distinct() // Apply the DISTINCT constraint
            ->get();
        // foreach ($patients as $patient) {
        //     echo $patient->patient->user->name . "<br>";
        //     echo $patient->patient->user->email . "<br>";
        // };
        return view('doctor.patients.index', [
            'patients' => $patients,

        ]);
    }
}
