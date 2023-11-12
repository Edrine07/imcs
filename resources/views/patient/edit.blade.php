@extends('layouts.admin')
@section('content')
    <div class="container px-6 mx-auto">
        <h2 class="my-6 text-xl font-semibold text-gray-700">
            Patient Information
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded shadow-lg">
            <form action="{{ route('patient.update', [$patients]) }}" method="POST">
                @csrf
                <div class="row my-5">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input type="text" name="patient_first_name"
                                class="form-control @error('patient_first_name') is-invalid @enderror"
                                value="{{ $patients->firstname }}" required>
                            @error('patient_first_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Middle Name</label>
                            <input type="text" name="patient_middle_name"
                                class="form-control @error('patient_middle_name') is-invalid @enderror"
                                value="{{ $patients->middlename }}">
                            @error('patient_middle_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="patient_last_name"
                                class="form-control @error('patient_last_name') is-invalid @enderror"
                                value="{{ $patients->lastname }}" required>
                            @error('patient_last_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Gender</label>
                            <select name="patient_gender"
                                class="form-control @error('patient_gender') is-invalid @enderror">
                                <option value="">--Please Select--</option>
                                <option value="Male" @selected($patients->gender == 'Male')>Male</option>
                                <option value="Female" @selected($patients->gender == 'Female')>Female</option>
                            </select>
                            @error('patient_gender')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Age</label>
                            <input type="number" name="patient_age"
                                class="form-control @error('patient_age') is-invalid @enderror"
                                value="{{ $patients->age }}">
                            @error('patient_age')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Contact No.</label>
                            <input type="text" name="patient_contact"
                                class="form-control @error('patient_contact') is-invalid @enderror"
                                value="{{ $patients->contact }}">
                            @error('patient_contact')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="text" name="patient_address"
                                class="form-control @error('patient_address') is-invalid @enderror"
                                value="{{ $patients->address }}" required>
                            @error('patient_address')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h4 class="my-5">Vital Information</h4>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Blood Pressure</label>
                            <input type="text" name="patient_bp"
                                class="form-control @error('patient_bp') is-invalid @enderror"
                                value="{{ $patients->patient_bp }}">
                            @error('patient_bp')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Cardiac Rate</label>
                            <input type="text" name="patient_cr"
                                class="form-control @error('patient_cr') is-invalid @enderror"
                                value="{{ $patients->patient_cr }}">
                            @error('patient_cr')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Respiratory Rate</label>
                            <input type="text" name="patient_rr"
                                class="form-control @error('patient_rr') is-invalid @enderror"
                                value="{{ $patients->patient_rr }}">
                            @error('patient_rr')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for=>Temperature</label>
                            <input type="text" name="patient_t"
                                class="form-control @error('patient_t') is-invalid @enderror"
                                value="{{ $patients->patient_t }}">
                            @error('patient_t')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Height</label>
                            <input type="text" name="patient_ht"
                                class="form-control @error('patient_ht') is-invalid @enderror"
                                value="{{ $patients->ht }}">
                            @error('patient_ht')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label>Weight</label>
                            <input type="text" name="patient_wt"
                                class="form-control @error('patient_wt') is-invalid @enderror"
                                value="{{ $patients->wt }}">
                            @error('patient_wt')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="py-4 flex">
                    <button type="submit" class="btn btn-primary">
                        Add New Patient
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
