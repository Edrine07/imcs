@extends('layouts.admin')

@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Walk-in List</span>
            </h3>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <a href="{{ route('walkin.create-patient') }}" class="btn btn-sm btn-primary">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </span>
                        Add New Walk In Patient</a>
                </div>
                {{-- <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete
                        Selected</button>
                </div> --}}
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>Patient Id</th>
                        <th class="min-w-120px">Patient Name</th>
                        <th class="min-w-120px">Address</th>
                        </th>
                        <th class="min-w-100px">Contact No.</th>
                        <th class="min-w-100px">Date</th>
                        <th class="min-w-120px">Time</th>
                        <th class="min-w-70px">Status</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @forelse($appointments as $appointment)
                        <tr class="text-gray-800 text-hover-primary mb-0">
                            <td>{{ $appointment->patient_id }}</td>
                            <td>{{ $appointment->patient->full_name }}</td>
                            <td>{{ Str::words($appointment->patient->address, 5, $end = '...') }}</td>
                            <td>+{{ $appointment->patient->contact }}</td>
                            <td>{{ $appointment?->appointment_date?->format('F d, Y') ?? '' }}</td>
                            <td class="text-end">
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $appointment->appointment_time)->format('h:i A') }}
                            </td>
                            <td>
                                @if ($appointment->appointment_status == 'Approved')
                                    <span class="badge badge-success">{{ $appointment->appointment_status }}</span>
                                @elseif($appointment->appointment_status == 'Completed')
                                    <span class="badge badge-primary">{{ $appointment->appointment_status }}</span>
                                @elseif($appointment->appointment_status == 'Pending')
                                    @if ($appointment->appointment_date->format('Y-m-d') < date('Y-m-d'))
                                        <span class="badge badge-danger">Expired</span>
                                    @else
                                        <span class="badge badge-warning">{{ $appointment->appointment_status }}</span>
                                    @endif
                                @else
                                    <span class="badge badge-danger">{{ $appointment->appointment_status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Walk-in Records</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $appointments->links() }}
        </div>
    </div>
@endsection
