@extends('layouts.admin')
@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            MEDICAL HISTORY
        </h2>

        <div class="w-100 mb-8 overflow-hidden rounded-lg shadow border">
            <div class="row g-4 pt-5 pb-5 px-5">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First name</label>
                    <input type="text" name="firstname" value="{{ $patient->firstname }}" class="form-control"
                        placeholder="" readonly>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last name</label>
                    <input type="text" name="lastname" value="{{ $patient->lastname }}" class="form-control"
                        placeholder="" readonly>
                </div>
            </div>
            <div class="row g-4 pb-5 px-5 justify-content-start">
                <div class="col-md-6">
                    <button data-bs-toggle="modal" data-bs-target="#staticModal" class="btn btn-primary" type="button">
                        VIEW PATIENT INFORMATION
                    </button>
                </div>
            </div>
            <div id="staticModal" class="modal fade" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">PATIENT INFORMATION</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-4">
                                <div class="col-md-4 mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input type="text" name="gender" value="{{ $patient->gender }}" class="form-control"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <input type="text" name="birthdate"
                                        value="{{ $patient->birthdate->format('F d, Y') }}" class="form-control"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" name="age" value="{{ $patient->gender }}" class="form-control"
                                        placeholder="" readonly>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact No.</label>
                                    <input type="text" name="contact" value="{{ $patient->contact }}"
                                        class="form-control" placeholder="" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ $patient->address }}"
                                        class="form-control" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="accordion-collapse" data-bs-accordion="collapse">
            @forelse ($appointments as $app)
                <div class="accordion" id="accordionItem{{ $app->id }}">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseItem{{ $app->id }}">
                            <span class="text-uppercase fw-bold fs-5">APPOINTMENT DATE:
                                {{ $app->appointment_date->format('F d, Y') }}</span>
                        </button>
                    </h2>

                    <div id="collapseItem{{ $app->id }}" class="accordion-collapse collapse">
                        <div class="card p-4 mb-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="bp" class="form-label">BP</label>
                                    <input type="text" name="bp" value="{{ $app->prescription->bp }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="cr" class="form-label">CR</label>
                                    <input type="text" name="cr" value="{{ $app->prescription->cr }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="rr" class="form-label">RR</label>
                                    <input type="text" name="rr" value="{{ $app->prescription->rr }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="t" class="form-label">T</label>
                                    <input type="text" name="t" value="{{ $app->prescription->t }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="wt" class="form-label">WT</label>
                                    <input type="text" name="wt" value="{{ $app->prescription->wt }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="ht" class="form-label">HT</label>
                                    <input type="text" name="ht" value="{{ $app->prescription->ht }}"
                                        class="form-control" readonly>
                                </div>
                            </div>

                            <div class="mt-5">
                                <label for="symptoms" class="form-label">SYMPTOMS</label>
                                <textarea name="symptoms" readonly rows="4" class="form-control" placeholder="Write your thoughts here...">{{ $app->prescription->symptoms }}</textarea>
                            </div>

                            <div class="mt-5">
                                <label for="diagnosis" class="form-label">DIAGNOSE</label>
                                <textarea name="diagnosis" readonly rows="4" class="form-control" placeholder="Write your thoughts here...">{{ $app->prescription->diagnosis }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h6 class="text-gray-500">No Medical History Data</h6>
            @endforelse
        </div>
    </div>
@endsection
