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
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname"
                                    required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="last_name" class="form-label mb-2">Last name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="gender" class="form-label mb-2">Gender</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="birthdate" class="form-label mb-2">Birthdate</label>
                                <input type="date" id="birthdate" max="{{ date('Y-m-d') }}" name="birthdate"
                                    class="form-control" required>
                            </div>

                            <div class="col-md-3 mb-2">
                                <label for="age" class="form-label mb-2">Age</label>
                                <input type="number" id="age" name="age" class="form-control" placeholder="0"
                                    readonly required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="contact" class="form-label mb-2">Contact</label>
                                <input type="text" pattern="[0-9]{11}" name="contact" class="form-control"
                                    placeholder="09xxxxxxxxx" title="Please enter a valid 11-digit mobile number" required>
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
                        <div class="row mb-5">
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
                            <div class="form-group col-md-12 mb-2">
                                <label for="symptoms" class="form-label mb-2">Symptoms</label>
                                <textarea name="symptoms" rows="4" class="form-control" placeholder="Type here..."></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="diagnosis" class="form-label mb-2">Diagnose</label>
                                <textarea name="diagnosis" rows="4" class="form-control" placeholder="Type here..."></textarea>
                            </div>
                            {{--  <div class="col-md-6 ">
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
                                                <th class="fw-bold">Quantity</th>
                                                <th class="fw-bold">View</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            
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
                                            <form action="#" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="app_id" value="">
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
                                                            <label>Quantity</label>
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
                        </div> --}}
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

@section('scripts')
    {{-- script to auto calculate age depending on birthdate input --}}
    <script>
        $(document).ready(function() {
            $('#birthdate').change(function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#age').val(age);
            });
        });
    </script>
@endsection
