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
                                <th class="min-w-100px">Patient Id</th>
                                <th class="min-w-120px">Patient Name</th>
                                <th class="min-w-120px">Address</th>
                                <th class="min-w-100px">Contact No.</th>
                                <th class="min-w-100px">Date</th>
                                <th class="min-w-120px">Time</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            <tr>
                                <td class="text-gray-800 text-hover-primary mb-1">
                                    0001
                                </td>
                                <td class="text-gray-800 text-hover-primary mb-1">
                                    Edrine B. Hagosojos
                                </td>
                                <td class="text-gray-800 mb-1">
                                    Gubat, Sorsogon
                                </td>
                                <td class="text-gray-800 mb-1">
                                    09384734793
                                </td>
                                <td class="text-gray-800 mb-1">
                                    October 20, 2023
                                </td>
                                <td class="text-gray-800 mb-1">
                                    9:00 AM
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-success">Approve</a>
                                    <a href="#" class="btn btn-sm  btn-danger">Cancel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
