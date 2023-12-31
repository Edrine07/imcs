@extends('layouts.admin')
@section('content')
    <div class="row g-5 g-xl-8">

        <div class="col-xl-4">
            <a href="{{ route('appointment.new') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                        fill="black" />
                                    <path
                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                        fill="black" />
                                    <path
                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-white fw-bolder display-5 my-2 text-center">{{ $todayAppointments }}</h2>
                        </div>
                        <div class="fw-bold fs-3 text-white">Today Appointments</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4">
            <a href="{{ route('appointment.index') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13H13V10C13 9.4 12.6 9 12 9C11.4 9 11 9.4 11 10V13H8C7.4 13 7 13.4 7 14C7 14.6 7.4 15 8 15H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V15H16C16.6 15 17 14.6 17 14C17 13.4 16.6 13 16 13Z"
                                        fill="black" />
                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                </svg>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-white display-5 fw-bolder my-2 text-center">{{ $appointments }}</h2>
                        </div>
                    </div>
                    <div class="fw-bold fs-3 text-white">Total Appointments</div>
                </div>
            </a>
        </div>

        <div class="col-xl-4">
            <a href="{{ route('patient.index') }}" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M6 20C6 20.6 5.6 21 5 21C4.4 21 4 20.6 4 20H6ZM18 20C18 20.6 18.4 21 19 21C19.6 21 20 20.6 20 20H18Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M21 20H3C2.4 20 2 19.6 2 19V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V19C22 19.6 21.6 20 21 20ZM12 10H10.7C10.5 9.7 10.3 9.50005 10 9.30005V8C10 7.4 9.6 7 9 7C8.4 7 8 7.4 8 8V9.30005C7.7 9.50005 7.5 9.7 7.3 10H6C5.4 10 5 10.4 5 11C5 11.6 5.4 12 6 12H7.3C7.5 12.3 7.7 12.5 8 12.7V14C8 14.6 8.4 15 9 15C9.6 15 10 14.6 10 14V12.7C10.3 12.5 10.5 12.3 10.7 12H12C12.6 12 13 11.6 13 11C13 10.4 12.6 10 12 10Z"
                                        fill="black" />
                                    <path
                                        d="M18.5 11C18.5 10.2 17.8 9.5 17 9.5C16.2 9.5 15.5 10.2 15.5 11C15.5 11.4 15.7 11.8 16 12.1V13C16 13.6 16.4 14 17 14C17.6 14 18 13.6 18 13V12.1C18.3 11.8 18.5 11.4 18.5 11Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <div class="text-white fw-bolder display-5 my-2 text-center">{{ $patients }}</div>
                        </div>
                    </div>
                    <div class="fw-bold fs-3 text-white">Total Patients</div>
                </div>
            </a>
        </div>
    </div>

    <canvas id="appointmentsChart" width="400" height="100" class="mb-5"></canvas>

    <div class="row g-5 g-xxl-8">
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Pending Appointments</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-hover table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="text-center">Patient Id</th>
                                    <th>Patient Name</th>
                                    <th class="min-w-150px">Address</th>
                                    <th>Contact No.</th>
                                    <th class="min-w-150px">Date</th>
                                    <th class="min-w-100px">Time</th>
                                    <th class="min-w-200px text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendingAppointments as $pending)
                                    <tr class="text-gray-800 fw-bold">
                                        <td class="text-center">{{ $pending->patient_id }}</td>
                                        <td>{{ $pending->patient->full_name }}</td>
                                        <td title="{{ $pending->patient->address }}">
                                            {{ Str::words($pending->patient->address, 5, $end = '...') }}</td>
                                        <td class="text-end">+{{ $pending->patient->contact }}</td>
                                        <td class="fw-bolder">{{ $pending->appointment_date->format('M. d, Y') }}</td>
                                        <td class="fw-bolder">
                                            {{-- display time in H:i A format --}}
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $pending->appointment_time)->format('h:i A') }}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('appointment.approve', $pending->id) }}"
                                                class="btn btn-sm btn-success">Approve</a>
                                            {{-- <a href="{{ route('appointment.cancel', $pending->id) }}"
                                                class="btn btn-sm  btn-danger">Cancel</a> --}}

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal">
                                                Cancel
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="backDropModal" data-bs-backdrop="static"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <form class="modal-content"
                                                        action="{{ route('appointment.cancel', $pending->id) }}"
                                                        method="">
                                                        @csrf
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title text-center" id="backDropModalTitle">
                                                                REASON FOR
                                                                CANCELATION</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <textarea placeholder="" name="reason" class="form-control" id="" rows="3">Type here... </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">SEND</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Pending Appointments Listed</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pendingAppointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var appointmentsData = @json($appointmentsCountByMonth);
        var walkInData = @json($appointmentsCountByMonthWalkIn);

        var labels = Object.keys(appointmentsData);
        var appointmentsCount = Object.values(appointmentsData);
        var walkInCount = Object.values(walkInData);

        var ctx = document.getElementById('appointmentsChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Completed Appointments',
                        data: appointmentsCount,
                        borderColor: 'rgba(0, 149, 232, 1)',
                        backgroundColor: 'rgba(0, 149, 232, 0.2)',
                        borderWidth: 3,
                    },
                    {
                        label: 'Completed Walk-ins',
                        data: walkInCount,
                        borderColor: 'rgba(0, 128, 0, 1)',
                        backgroundColor: 'rgba(0, 128, 0, 0.2)',
                        borderWidth: 3,
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Records for This Year',
                        font: {
                            size: 16
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
