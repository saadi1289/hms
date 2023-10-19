@extends('layouts.main')
@section('title', 'Add Doctor')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Doctor</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.doctor') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Picture</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src=" "
                                class="img-fluid rounded-circle mb-2" width="150" height="150" />
                        </div>


                    </div>
                    <div class="text-center">
                        <a href="" class="btn btn-primary">Edit</a>
                    </div>
                </div>

                <div class="col-md-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Details</h5>
                        </div>
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        First Name:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Middle Name:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Last Name:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Email:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Phone Number:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        DoB:
                                    </p>
                                </div>

                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        List:
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Address:
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Picture</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('template/img/contacts/') }}" class="img-fluid rounded-circle mb-2"
                                width="150" height="150" />
                        </div>
                        <div class="text-center">
                            <a href="" class="btn btn-primary">Update Picture</a>
                        </div>
                        <div class="col-md-8 col-xl-9">
                            <div class="card">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Details</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        First Name:
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        Middle Name:
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        Last Name:
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        Email:
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        Phone Number:
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        DoB:
                                                    </p>
                                                </div>

                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        List:
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="border p-2 rounded">
                                                        Address:
                                                    </p>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        @include('partials.alerts')
                                                        <form action="{{ route('admin.doctor.edit', $doctor) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PATCH')


                                                            {{-- <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" placeholder="Enter your name!"
                                                    value="{{ old('name') ?? $doctor->user->name }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" placeholder="Enter your email!"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Enter your password!">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Password
                                                    Confirmation</label>
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="password_confirmation" name="password_confirmation"
                                                    placeholder="Confirm your password!">
                                                @error('password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="experience" class="form-label">Experience</label>
                                                <input type="text"
                                                    class="form-control @error('experience') is-invalid @enderror"
                                                    id="experience" name="experience" placeholder="Enter your experience!"
                                                    value="{{ old('experience') }}">
                                                @error('experience')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="specialization" class="form-label">Specialization</label>
                                                <input type="text"
                                                    class="form-control @error('specialization') is-invalid @enderror"
                                                    id="specialization" name="specialization"
                                                    placeholder="Enter your specialization!"
                                                    value="{{ old('specialization') }}">
                                                @error('specialization')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Phone Number</label>
                                                <input type="text"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    id="phone_number" name="phone_number"
                                                    placeholder="Enter your phone_number!"
                                                    value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div> --}}


                                                            <div>
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Save">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
    </main>
@endsection
