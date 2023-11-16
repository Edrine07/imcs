@extends('layouts.admin')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Appointment List</span>
            </h3>
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
                            <td>{{ $appointment->patient->contact }}</td>
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
                            <td colspan="7" class="text-center">No Appointments</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
