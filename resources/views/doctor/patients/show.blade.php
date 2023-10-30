@extends('layouts.doctor_main')
@section('title', 'Patient')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Patient</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            @include('partials.alerts')

            <div class="row">




                        <div class="col-auto">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Enter your password!">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm your password!">
                        </div>

                        <div class="mt-3">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>

                </div>

                <div class="col-md-8 col-xl-9">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter your name"
                                value="">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Enter your email!"
                                value="">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control @error('gender') is-invalid @enderror"
                                id="gender" name="gender" placeholder="Enter your gender!"
                                value="">
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="cnic" class="form-label">CNIC</label>
                            <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                id="cnic" name="cnic" placeholder="Enter your cnic!"
                                value="">
                            @error('cnic')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror"
                                id="age" name="age" placeholder="Enter your age!"
                                value="">
                            @error('age')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height</label>
                            <input type="text" class="form-control @error('height') is-invalid @enderror"
                                id="height" name="height" placeholder="Enter your height!"
                                value="">
                            @error('height')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                id="weight" name="weight" placeholder="Enter your weight!"
                                value="">
                            @error('weight')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number" placeholder="Enter your phone_number!"
                                value="">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                id="address" name="address" placeholder="Enter your address!"
                                value="">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
