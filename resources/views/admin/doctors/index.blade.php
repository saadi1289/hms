@extends('layouts.main')
@section('title', 'Doctors')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Doctors</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.doctor.create') }}" class="btn btn-outline-primary">Add Doctor</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            {{-- @if (count($contacts) > 0) --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Specialization</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                </table>

                                {{-- <div class="row justify-content-end">
                                    <div class="col-auto">
                                        {{ $contacts->links('vendor.pagination.bootstrap-5') }}
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
