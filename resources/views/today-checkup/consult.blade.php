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
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            CONSULTATION | {{ $appointment->patient->fullname }}
        </h2>

        <div class="w-100 mb-4 overflow-hidden bg-white rounded-sm shadow-xl dark:bg-gray-800">
            <div class="row row-cols-md-2 pt-4 pb-4 px-4">
                <div class="col-md-6">
                    <label for="first_name" class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">First
                        name</label>
                    <input type="text" name="firstname" value="{{ $appointment->patient->firstname }}"
                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                        placeholder="" readonly>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">Last
                        name</label>
                    <input type="text" name="lastname" value="{{ $appointment->patient->lastname }}"
                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                        placeholder="" readonly>
                </div>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-6">
                    <button data-bs-toggle="modal" data-bs-target="#staticModal"
                        class="btn btn-primary btn-sm text-white bg-primary hover-bg-primary-dark focus-ring-4 focus-ring-blue font-weight-bold text-sm px-3 py-2 text-center"
                        type="button">
                        VIEW PATIENT INFORMATION
                    </button>
                </div>
            </div>
            <div class="modal fade" id="staticModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bg-white rounded-lg shadow">
                        <div class="modal-header">
                            <h3 class="modal-title text-xl font-weight-bold text-dark">
                                PATIENT INFORMATION
                            </h3>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span class="visually-hidden">Close modal</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row row-cols-md-3">
                                <div class="col-md-6 mb-5">
                                    <label for="last_name"
                                        class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">Gender</label>
                                    <input type="text" name="lastname" value="{{ $appointment->patient->gender }}"
                                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label for="first_name"
                                        class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">Birthdate</label>
                                    <input type="date" name="firstname"
                                        value="{{ $appointment->patient->birthdate->format('Y-m-d') }}"
                                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label for="last_name"
                                        class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">Age</label>
                                    <input type="text" name="lastname" value="{{ $appointment->patient->age }}"
                                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                                        placeholder="" readonly>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="last_name"
                                        class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">Contact
                                        No.</label>
                                    <input type="text" name="lastname" value="+{{ $appointment->patient->contact }}"
                                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="first_name"
                                        class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">Address</label>
                                    <input type="text" name="firstname" value="{{ $appointment->patient->address }}"
                                        class="form-control form-control-sm   border border-secondary text-dark rounded-lg focus-ring-blue-500 focus-border-blue-500"
                                        placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mb-4 overflow-hidden bg-white rounded-sm shadow-xl dark:bg-gray-800">
            <div class="p-5">
                <form action="{{ route('checkup.store-consult', $appointment->id) }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-5">
                        <div class="row row-cols-1 row-cols-md-6">
                            <div class="col">
                                <label for="bp"
                                    class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">BP</label>
                                <div class="input-group">
                                    <input type="number" min="1" name="bp"
                                        class="form-control   border border-secondary rounded-lg text-dark" required>
                                    <span class="input-group-text px-2">/</span>
                                    <input type="number" min="1" name="bp2"
                                        class="form-control   border border-secondary rounded-lg text-dark" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="cr"
                                    class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">CR</label>
                                <div class="input-group">
                                    <input type="number" name="cr" min="1"
                                        class="form-control   border border-secondary rounded-lg text-dark" placeholder=""
                                        required>
                                    <span class="input-group-text">/min</span>
                                </div>
                            </div>
                            <div class="col">
                                <label for="rr"
                                    class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">RR</label>
                                <input type="number" step="0.01" name="rr" min="1"
                                    class="form-control   border border-secondary rounded-lg text-dark" placeholder="">
                            </div>
                            <div class="col">
                                <label for="t"
                                    class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">T</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="t" min="1"
                                        class="form-control   border border-secondary rounded-lg text-dark" placeholder=""
                                        required>
                                    <span class="input-group-text">°C</span>
                                </div>
                            </div>
                            <div class="col">
                                <label for="wt"
                                    class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">WT</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="wt" min="1"
                                        class="form-control   border border-secondary rounded-lg text-dark" placeholder=""
                                        required>
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                            <div class="col">
                                <label for="ht"
                                    class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">HT</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="ht" min="1"
                                        class="form-control   border border-secondary rounded-lg text-dark"
                                        placeholder="">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 pb-3">
                            <label for="symptoms"
                                class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">SYMPTOMS</label>
                            <textarea name="symptoms" rows="4"
                                class="form-control form-control-sm   rounded-lg border border-secondary text-dark" placeholder="Type here..."></textarea>
                        </div>
                        <div class="pt-3 pb-3">
                            <label for="diagnosis"
                                class="form-label mb-2 text-sm fw-bold text-gray-900 dark:text-white">DIAGNOSE</label>
                            <textarea name="diagnosis" rows="4"
                                class="form-control form-control-sm   rounded-lg border border-secondary text-dark" placeholder="Type here..."></textarea>
                        </div>
                        <div class="pt-3 pb-3">
                            <button type="submit"
                                class="btn btn-primary btn-sm rounded-lg text-white px-4 py-2 me-2 mb-2">SAVE
                                CONSULTATION</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
