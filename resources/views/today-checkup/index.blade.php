@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                Today's Checkup
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_customer">
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
                        Add Patient</button>
                </div>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete
                        Selected</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">Patient Id</th>
                        <th class="min-w-100px">Patient Name</th>
                        <th class="min-w-70px">Age</th>
                        <th class="min-w-70px">Sex</th>
                        <th class="min-w-100px">Address</th>
                        <th class="min-w-100px">Contact No.</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @forelse ($appointments as $todays)
                        <tr class="text-gray-800">
                            <td>{{ $todays->patient_id }}</td>
                            <td>{{ $todays->patient->full_name }}</td>
                            <td>{{ $todays->patient->age }}</td>
                            <td>{{ $todays->patient->gender }}</td>
                            <td>{{ $todays->patient->address }}</td>
                            <td>{{ $todays->patient->contact }}</td>
                            <td class="text-end">
                                <a href="{{ route('checkup.consult', $todays->id) }}"
                                    class="btn btn-sm btn-success">Consult</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_add_customer_form"
                    data-kt-redirect="../../demo1/dist/apps/customers/list.html">
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <h2 class="fw-bolder">Add Walk in Patient</h2>
                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary"
                            data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">First name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">Last name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="" />
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-bold mb-2">Sex</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select sex" name="target_assign">
                                        <option value="">Select sex...</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class=" fs-5 fw-bold mb-2">Age</label>
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="" />
                                </div>
                            </div>

                            <div class="fv-row mb-15">
                                <label class="fs-6 fw-bold mb-2">Contact</label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="description" />
                            </div>

                            <div class="fv-row mb-15">
                                <label class="fs-6 fw-bold mb-2">Address</label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="description" />
                            </div>
                            <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                                href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false"
                                aria-controls="kt_customer_view_details">Vital Signs Information
                                <span class="ms-2 rotate-180">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </span>
                            </div>
                            <div id="kt_modal_add_customer_billing_info" class="collapse show">
                                <div class="row mb-5">
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Blood Pressure</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="patient_bp" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Cardiac Rate</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="patient_cr" />
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Respiratory Rate</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="patient_rr" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Temperature</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="patient_t" />
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold mb-2">Height</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="patient_ht" />
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class=" fs-5 fw-bold mb-2">Weight</label>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="patient_wt" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal"
                            class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
