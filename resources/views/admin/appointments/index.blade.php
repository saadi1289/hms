@extends('layouts.main')
@section('title', 'Appointments')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Appointments</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.appointment.create') }}" class="btn btn-outline-primary">Book An Appointment</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            {{-- @if (count($doctors) > 0) --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th> Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date/Time</th>
                                            <th>Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($doctors as $doctor) --}}
                                            <tr>
                                                <td>1</td>
                                                <td>patient name</td>

                                                <td>doctor name</td>
                                                <td>Date/time</td>
                                                <td>fee</td>
                                                <td>
                                                    <a href="{{ route('admin.appointment.show' , $appointment) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <form action="{{ route('admin.appointment.destroy' , $appointment) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- <div class="row justify-content-end">
                                    <div class="col-auto">
                                        {{ $doctor->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div> --}}
                            {{-- @else --}}
                                <div class="alert alert-info">No record found</div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
