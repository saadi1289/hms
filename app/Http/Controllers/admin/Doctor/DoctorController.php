<?php

namespace App\Http\Controllers\admin\Doctor;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create', [
             'doctors' => Doctor::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required', 'email', 'unique:users,email'],
            'passsword'=>['required', 'confirmed'],
            'picture'=>['required'],
            'specialization'=>['required'],
            'phone_number'=>['required'],
            'experience'=>['required'],
        ]);
        $data =[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        $is_created = User::create($data);
        if ($is_created) {
            $id = $is_created->id;
            $data = [
                'user_id'=>$id,
                'specialization'=>$request->specialization,
                'phone_number'=>$request->phone_number,
                'experience'=>$request->experience,
            ];
            $is_created = Doctor::create($data);
            if ($is_created) {
                return back()->with(['success' =>'Data successfully created!']);
            } else{
                return back()->with(['failure' =>'Failed to create!']);
            }
        } else{
            return back()->with(['failure' =>'Failed to create!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
