@extends('layouts.admin')

@section('content')
    <div class="row g-5 g-xxl-8">
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Patients List</span>
                    </h3>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
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
                                    <td>{{ $patient->full_name }}</td>
                                    <td title="{{ $patient->address }}">{{ Str::words($patient->address, 5, $end = '...') }}
                                    </td>
                                    <td>{{ $patient->contact }}</td>
                                    <td class="d-flex justify-content-center align-items-end">
                                        <a href="{{ route('patient.med-history', $patient->id) }}"
                                            class="btn btn-sm btn-primary me-2">View Medical History</a>
                                        {{-- <a href="{{ route('patient.edit', $patient->id) }}"
                                            class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
