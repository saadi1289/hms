<?php

namespace App\Http\Controllers\admin\appointmnet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('admin.appointments.index'
        );
    }
}
