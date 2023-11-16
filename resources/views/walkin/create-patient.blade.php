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
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">First name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname"
                                    id="firstname" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Last name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="lastname" class="form-control" placeholder="Lastname"
                                    id="lastname" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="gender" class="form-label">Gender <span class="text-danger">*</span> </label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="birthdate" class="form-label">Birthdate <span class="text-danger">*</span>
                                </label>
                                <input type="date" id="birthdate" max="{{ date('Y-m-d') }}" name="birthdate"
                                    class="form-control" required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="age" class="form-label">Age <span class="text-danger">*</span> </label>
                                <input type="number" id="age" name="age" class="form-control" placeholder="0"
                                    readonly required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="contact" class="form-label">Contact No. <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="text" pattern="[0-9]{10}" name="contact" class="form-control"
                                        id="contact" placeholder="9xxxxxxxxx"
                                        title="Please enter a valid 11-digit mobile number" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span> </label>
                                <input type="text" name="address" class="form-control" placeholder="" required>
                                <span class="text-muted ms-4">Purok/Str. No., Barangay, Municipality, Province/City</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 mb-8 bg-white rounded-sm shadow-xl dark:bg-gray-800">
                    <div class="p-5">
                        <div class="row mb-5">
                            <div class="col-md-2">
                                <label for="bp" class="form-label mb-2">BP <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="bp" min="1" class="form-control"
                                        title="Blood Pressure" required>
                                    <span class="input-group-text px-2">/</span>
                                    <input type="number" name="bp2" min="1" class="form-control"
                                        title="Blood Pressure" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="cr" class="form-label mb-2">CR <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" step="0.01" min="1" name="cr"
                                        class="form-control" title="Cardiac Rate" required>
                                    <span class="input-group-text">/min</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="rr" class="form-label mb-2">RR</label>
                                <input type="number" step="0.01" min="1" name="rr" class="form-control"
                                    title="Respiratory Rate">
                            </div>
                            <div class="col-md-2">
                                <label for="t" class="form-label mb-2">T <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" step="0.01" min="1" name="t"
                                        class="form-control" title="Temperature" required>
                                    <span class="input-group-text">&#8451;</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="wt" class="form-label mb-2">WT <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" step="0.01" min="1" name="wt"
                                        class="form-control" title="Weight" required>
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="ht" class="form-label mb-2">HT</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" min="1" name="ht"
                                        class="form-control" title="Height">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <label for="symptoms" class="form-label mb-2">Symptoms <span
                                        class="text-danger">*</span></label>
                                <textarea name="symptoms" rows="4" class="form-control" placeholder="Type here..."></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="diagnosis" class="form-label mb-2">Diagnose <span
                                        class="text-danger">*</span></label>
                                <textarea name="diagnosis" rows="4" class="form-control" placeholder="Type here..."></textarea>
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

@section('scripts')
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
    <script>
        const contactInput = document.getElementById('contact');
        const firstnameInput = document.getElementById('firstname');
        const lastnameInput = document.getElementById('lastname');
        // const cNumWarn = document.getElementById('cNumWarn');


        // validate while typing, if length is not equal to 10 and if value has non-numeric characters, add is-invalid class
        contactInput.addEventListener('keyup', function() {
            if (this.value.length != 10 || isNaN(this.value)) {
                this.classList.add('is-invalid');
                // cNumWarn.style.display = 'block';
            } else {
                this.classList.remove('is-invalid');
                // cNumWarn.style.display = 'none';
            }
        });

        firstnameInput.addEventListener('input', function() {
            var inputValue = this.value;
            var isValid = /^[A-Za-z\s]+$/.test(inputValue);
            var isFirstCharSpace = /^\s/.test(inputValue); // Check if the first character is a space

            if (!isValid || isFirstCharSpace) {
                this.classList.add('is-invalid');
                // fnameWarn.style.display = "block";
            } else {
                this.classList.remove('is-invalid');
                // fnameWarn.style.display = "none";
            }
        });


        lastnameInput.addEventListener('input', function() {
            var inputValue = this.value;
            var isValid = /^[A-Za-z\s]+$/.test(inputValue);
            var isFirstCharSpace = /^\s/.test(inputValue); // Check if the first character is a space

            if (!isValid || isFirstCharSpace) {
                this.classList.add('is-invalid');
                // lnameWarn.style.display = "block";
            } else {
                this.classList.remove('is-invalid');
                // lnameWarnText.style.display = "none";
                // lnameWarn.style.display = "none";
            }
        });
    </script>
@endsection
