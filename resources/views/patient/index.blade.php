@extends('layouts.admin')

@section('styles')
    <style>
        /* For Chrome, Safari, and Opera */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* For Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('content')
    <div class="row g-5 g-xxl-8">
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Patients List</span>
                    </h3>
                    <div class="card-toolbar">
                        <form action="{{ route('patient.index') }}" method="get">
                            @csrf
                            <div class="form-group pt-3">
                                <input class="form-control form-control-sm d-none d-md-block me-3" type="search"
                                    autocomplete="off" autofocus placeholder="Search..." name="search"
                                    style="width: 300px;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 py-0 table-sm" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th class="min-w-120px">Patient Name</th>
                                <th class="min-w-120px">Address</th>
                                <th class="min-w-100px">Contact No.</th>
                                <th class="text-center min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @forelse ($patients as $patient)
                                <tr class="text-gray-800 text-hover-primary">
                                    <td class="text-gray-400">{{ $loop->iteration }}</td>
                                    <td>
                                        <button class="btn btn-link btn-outline-link" data-bs-toggle="modal"
                                            data-bs-target="#modalAdd{{ $patient->id }}">{{ $patient->full_name }}</button>
                                    </td>
                                    <td title="{{ $patient->address }}">
                                        <button class="btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#modalAdd{{ $patient->id }}">
                                            {{ Str::words($patient->address, 5, $end = '...') }}
                                        </button>
                                    </td>
                                    <td>{{ $patient->contact }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('patient.med-history', $patient->id) }}"
                                            class="btn btn-sm btn-primary me-2">View Medical History</a>
                                    </td>
                                </tr>

                                <div id="modalAdd{{ $patient->id }}" class="modal fade" data-bs-backdrop="static"
                                    tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add New Consultation Today ({{ date('F d, Y') }})
                                                    for
                                                    {{ $patient->full_name }}
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('appointment.new-consult') }}" method="POST"
                                                autocomplete="off">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="bp" class="form-label mb-2">BP <span
                                                                    class="text-danger">*</span> </label>
                                                            <div class="input-group">
                                                                <input type="number" min="1" name="bp"
                                                                    class="form-control" required>
                                                                <span class="input-group-text px-1">/</span>
                                                                <input type="number" min="1" name="bp2"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="cr" class="form-label mb-2">CR <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" min="1" step="0.01"
                                                                    name="cr" class="form-control" required>
                                                                <span class="input-group-text">/min</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="rr" class="form-label mb-2">RR</label>
                                                            <input type="number" min="0" step="0.01"
                                                                name="rr" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="t" class="form-label mb-2">T <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" step="0.01" min="1"
                                                                    name="t" class="form-control" required>
                                                                <span class="input-group-text">°C</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="wt" class="form-label mb-2">WT <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" step="0.01" min="1"
                                                                    name="wt" class="form-control" required>
                                                                <span class="input-group-text">kg</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="ht" class="form-label mb-2">HT</label>
                                                            <div class="input-group">
                                                                <input type="number" step="0.01" min="1"
                                                                    name="ht" class="form-control">
                                                                <span class="input-group-text">cm</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12 mb-2">
                                                            <label for="symptoms" class="form-label mb-2">Symptoms</label>
                                                            <textarea name="symptoms" rows="4" class="form-control" placeholder="Type here..."></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-2">
                                                            <label for="diagnosis"
                                                                class="form-label mb-2">Diagnose</label>
                                                            <textarea name="diagnosis" rows="4" class="form-control" placeholder="Type here..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add
                                                        Consultation</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No patients found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
