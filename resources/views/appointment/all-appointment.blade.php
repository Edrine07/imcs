@extends('layouts.admin')
@section('content')

<!--begin::Tables Widget 13-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Appointment List</span>
        </h3>
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Approve</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Cancel</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Pending</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mt-3 opacity-75"></div>
                <!--end::Menu separator-->
            </div>
            <!--end::Menu 2-->
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-100px">Patient Id</th>
                    <th class="min-w-120px">Patient Name</th>
                    <th class="min-w-120px">Address</th></th>
                    <th class="min-w-100px">Contact No.</th>
                    <th class="min-w-100px">Date</th>
                    <th class="min-w-120px">Time</th>
                    <th class="min-w-70px">Status</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
                <tr>
                    <td class="text-gray-800 text-hover-primary mb-1">
                        0001
                    </td>
                    <!--begin::Name=-->
                    <td class="text-gray-800 text-hover-primary mb-1">
                        Edrine B. Hagosojos
                    </td>
                    <!--end::Name=-->
                    <!--begin::Email=-->
                    <td class="text-gray-800 mb-1">
                        Gubat, Sorsogon
                    </td>
                    <!--end::Email=-->
                    <!--begin::Company=-->
                    <td class="text-gray-800 mb-1">
                        09384734793
                    </td>
                    <!--end::Company=-->
                    <!--begin::Payment method=-->
                    <td class="text-gray-800 mb-1">
                        October 20, 2023
                    </td>
                    <!--end::Payment method=-->
                    <!--begin::Date=-->
                    <td class="text-gray-800 mb-1">
                        9:00 AM
                    </td>
                    <!--end::Date=-->
                    <td class="">
                        <span class="badge badge-light-primary">Approved</span>
                    </td>
                </tr>
                <tr>
                    <td class="text-gray-800 text-hover-primary mb-1">
                        0001
                    </td>
                    <!--begin::Name=-->
                    <td class="text-gray-800 text-hover-primary mb-1">
                        Edrine B. Hagosojos
                    </td>
                    <!--end::Name=-->
                    <!--begin::Email=-->
                    <td class="text-gray-800 mb-1">
                        Gubat, Sorsogon
                    </td>
                    <!--end::Email=-->
                    <!--begin::Company=-->
                    <td class="text-gray-800 mb-1">
                        09384734793
                    </td>
                    <!--end::Company=-->
                    <!--begin::Payment method=-->
                    <td class="text-gray-800 mb-1">
                        October 20, 2023
                    </td>
                    <!--end::Payment method=-->
                    <!--begin::Date=-->
                    <td class="text-gray-800 mb-1">
                        9:00 AM
                    </td>
                    <!--end::Date=-->
                    <td class="">
                        <span class="badge badge-light-danger">Cancel</span>
                    </td>
                </tr>
                <tr>
                    <td class="text-gray-800 text-hover-primary mb-1">
                        0001
                    </td>
                    <!--begin::Name=-->
                    <td class="text-gray-800 text-hover-primary mb-1">
                        Edrine B. Hagosojos
                    </td>
                    <!--end::Name=-->
                    <!--begin::Email=-->
                    <td class="text-gray-800 mb-1">
                        Gubat, Sorsogon
                    </td>
                    <!--end::Email=-->
                    <!--begin::Company=-->
                    <td class="text-gray-800 mb-1">
                        09384734793
                    </td>
                    <!--end::Company=-->
                    <!--begin::Payment method=-->
                    <td class="text-gray-800 mb-1">
                        October 20, 2023
                    </td>
                    <!--end::Payment method=-->
                    <!--begin::Date=-->
                    <td class="text-gray-800 mb-1">
                        9:00 AM
                    </td>
                    <!--end::Date=-->
                    <td class="">
                        <span class="badge badge-light-warning">Pending</span>
                    </td>
                </tr>
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
</div>
<!--end::Tables Widget 13-->

@endsection
