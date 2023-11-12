@extends('layouts.admin')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Appointment List</span>
            </h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                    opacity="0.3" />
                                <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                    opacity="0.3" />
                                <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                    opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                    </div>
                    <div class="separator mb-3 opacity-75"></div>
                    <div class="menu-item px-3">
                        <a href="" class="menu-link px-3">Approve</a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="" class="menu-link px-3">Cancel</a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="" class="menu-link px-3">Pending</a>
                    </div>
                    <div class="separator mt-3 opacity-75"></div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">Patient Id</th>
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
                            <td>{{ $appointment->patient->firstname }}</td>
                            <td>{{ Str::words($appointment->patient->address, 5, $end = '...') }}</td>
                            <td>{{ $appointment->patient->contact }}</td>
                            <td>{{ $appointment?->appointment_date?->format('F d, Y') ?? '' }}</td>
                            @php
                                $appointment_time = new DateTime($appointment->appointment_time);
                                $formattedTime = $appointment_time->format('H:i A');
                            @endphp
                            <td class="text-end">{{ $formattedTime ?? '' }}</td>
                            <td>
                                @if ($appointment->appointment_status == 'Approved')
                                    <span class="badge badge-light-primary">{{ $appointment->appointment_status }}</span>
                                @elseif($appointment->appointment_status == 'Pending')
                                    <span class="badge badge-light-warning">{{ $appointment->appointment_status }}</span>
                                @else
                                    <span class="badge badge-light-danger">{{ $appointment->appointment_status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">No Appointments</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
