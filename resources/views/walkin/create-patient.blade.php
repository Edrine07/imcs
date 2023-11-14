@extends('layouts.admin')
@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto">
            <h2 class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                WALKIN PATIENT INFORMATION
            </h2>
            <form action="{{ route('walkin.store-patient') }}" method="POST" autocomplete="off">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-sm shadow-xl dark:bg-gray-800">
                    <div class="p-5">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="first_name" class="form-label mb-2">First name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="last_name" class="form-label mb-2">Last name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="gender" class="form-label mb-2">Gender</label>
                                <select name="gender" id="gender" class="form-select">
                                    <option value="">Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="birthdate" class="form-label mb-2">Birthdate</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder=""
                                    required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="age" class="form-label mb-2">Age</label>
                                <input type="text" name="age" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contact" class="form-label mb-2">Contact</label>
                                <input type="number" name="contact" class="form-control" placeholder="" required>
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="address" class="form-label mb-2">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 mb-8 bg-white rounded-sm shadow-xl dark:bg-gray-800">
                    <div class="p-5">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="bp" class="form-label mb-2">BP</label>
                                <input type="text" name="bp" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <label for="cr" class="form-label mb-2">CR</label>
                                <input type="text" name="cr" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <label for="rr" class="form-label mb-2">RR</label>
                                <input type="text" name="rr" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <label for="t" class="form-label mb-2">T</label>
                                <input type="text" name="t" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <label for="wt" class="form-label mb-2">WT</label>
                                <input type="text" name="wt" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <label for="ht" class="form-label mb-2">HT</label>
                                <input type="text" name="ht" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  mb-2">
                                    <label for="symptoms" class="form-label mb-2">Symptoms</label>
                                    <textarea name="symptoms" rows="4" class="form-control" placeholder="Type here..."></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="diagnosis" class="form-label mb-2">Diagnose</label>
                                    <textarea name="diagnosis" rows="4" class="form-control" placeholder="Type here..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="mt-5">
                                    <h5 class="mt-3">MEDICINE TO TAKE</h5>
                                    <button data-bs-toggle="modal" data-bs-target="#defaultModal"
                                        class="btn btn-primary my-4 text-white bg-primary" type="button">
                                        ADD MEDICINE
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-borderless align-middle">
                                        <thead class="table-light">
                                            <tr class="thead-dark text-center">
                                                <th class="fw-bold">Medicine Name</th>
                                                <th class="fw-bold">Type</th>
                                                <th class="fw-bold">View</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @forelse ($app->medToTake as $med)
                                                <tr class="text-center">
                                                    <td>{{ $med->medName->medicine_name }}</td>
                                                    <td>{{ $med->medName->medicine_type }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#medModal{{ $med->id }}">
                                                            View
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="medModal{{ $med->id }}" tabindex="-1"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">Medicine to
                                                                    Take
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('patient.med-store', $med->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="med_id"
                                                                        value="{{ $med->id }}">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-2">
                                                                                <label>Choose a Medicine</label>
                                                                                <select name="medicine_id"
                                                                                    class="form-control">
                                                                                    <option value="">Please
                                                                                        Select</option>
                                                                                    @foreach ($medicines as $medic)
                                                                                        <option value="{{ $medic->id }}"
                                                                                            @selected($medic->id == $med->medName->id)>
                                                                                            {{ $medic->medicine_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mb-2">
                                                                                <label>Dose</label>
                                                                                <input type="text" name="medicine_dose"
                                                                                    value="{{ $med->medicine_dose }}"
                                                                                    class="form-control" placeholder=""
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-2">
                                                                                <label>Unit</label>
                                                                                <input type="text" name="medicine_unit"
                                                                                    value="{{ $med->medicine_unit }}"
                                                                                    class="form-control" placeholder=""
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group mb-2">
                                                                                <label>Duration</label>
                                                                                <input type="text" name="duration"
                                                                                    value="{{ $med->duration }}"
                                                                                    class="form-control" placeholder=""
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No Medicine to Take</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal fade" id="defaultModal" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Add Medicine to Take</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('patient.med-store', $app->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="app_id" value="{{ $app->id }}">
                                                    <div class="row">
                                                        <div class="form-group mb-2 col-md-6">
                                                            <label>Choose a Medicine</label>
                                                            <select name="medicine_id" required class="form-control">
                                                                <option value="">Select Medicine</option>
                                                                @foreach ($medicines as $med)
                                                                    <option value="{{ $med->id }}">
                                                                        {{ $med->medicine_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-2 col-md-6">
                                                            <label>Dose</label>
                                                            <input type="text" name="medicine_dose"
                                                                class="form-control" placeholder="" required>
                                                        </div>
                                                        <div class="form-group mb-2 col-md-4">
                                                            <label>Unit</label>
                                                            <input type="text" name="medicine_unit"
                                                                class="form-control" placeholder="" required>
                                                        </div>
                                                        <div class="form-group mb-2 col-md-8">
                                                            <label>Duration</label>
                                                            <input type="text" name="duration" class="form-control"
                                                                placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
