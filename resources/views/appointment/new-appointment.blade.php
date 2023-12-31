@extends('layouts.admin')

@section('content')
    <div class="row g-5 g-xxl-8">
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Today's Appointments List</span>
                    </h3>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>Patient Id</th>
                                <th class="min-w-120px">Patient Name</th>
                                <th class="min-w-120px">Address</th>
                                <th class="min-w-100px">Contact No.</th>
                                <th class="min-w-100px">Date</th>
                                <th class="min-w-120px">Time</th>
                                <th class="text-center min-w-70px">Status</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @forelse ($appointments as $item)
                                <tr class="text-gray-800">
                                    <td>{{ $item->patient_id }}</td>
                                    <td>{{ $item->patient->full_name }}</td>
                                    <td>{{ Str::words($item->patient->address, 5, '...') }}</td>
                                    <td>{{ $item->patient->contact }}</td>
                                    <td>{{ $item->appointment_date->format('F d, Y') }}</td>
                                    <td class="text-end">
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->appointment_time)->format('h:i A') }}
                                    </td>
                                    <td>
                                        @if ($item->appointment_status == 'Approved')
                                            <span class="badge badge-success">{{ $item->appointment_status }}</span>
                                        @elseif($item->appointment_status == 'Completed')
                                            <span class="badge badge-primary">{{ $item->appointment_status }}</span>
                                        @elseif($item->appointment_status == 'Pending')
                                            <span class="badge badge-warning">{{ $item->appointment_status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $item->appointment_status }}</span>
                                        @endif
                                    </td>
                                    {{-- <td class="d-flex justify-content-center align-items-end">
                                        <a href="{{ route('appointment.approve', $item->id) }}"
                                            class="btn btn-sm btn-success">Approve</a>
                                        <a href="{{ route('appointment.cancel', $item->id) }}"
                                            class="btn btn-sm btn-danger">Cancel</a>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No appointments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
