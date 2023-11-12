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
                            <div class="col-md-12 mb-2">
                                <label for="symptoms" class="form-label mb-2">Symptoms</label>
                                <textarea name="symptoms" rows="4" class="form-control" placeholder="Type here..."></textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="diagnosis" class="form-label mb-2">Diagnose</label>
                                <textarea name="diagnosis" rows="4" class="form-control" placeholder="Type here..."></textarea>
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
