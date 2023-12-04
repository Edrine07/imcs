@extends('layouts.guest')

@section('styles')
    <style>
        .fc-daygrid-day-events {
            display: none;
        }

        .fc-highlight {
            background: rgb(78, 145, 239) !important;
        }

        #calendar .unselectable-date {
            background-color: rgb(202, 200, 200);
            cursor: not-allowed;
        }

        #calendar .unselectable-date a {
            color: rgb(136, 133, 133);
        }

        #calendar .doctor-out {
            background-color: rgba(246, 83, 83, 0.618);
            cursor: not-allowed;
        }

        #calendar .selectable-date {
            background-color: rgb(214, 250, 214);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-5 pb-4">
            <div class="flex-shrink-0">
                <a href="/"
                    class="text-italic font-light h1 display-6 font-serif text-violet-400 text-poppins cursor-pointer mb-5">
                    Immaculate Medico-Surgical Clinic
                </a>
            </div>
        </div>

        <div class="container mt-5">
            <form action="{{ route('appointment.reserve_appointment') }}" method="post" class="my-auto" autocomplete="off">
                @csrf
                <div class="row bg-white rounded rounded-3 shadow p-4">
                    <x-app-success></x-app-success>
                    <x-app-error></x-app-error>
                    <div class="col-md-4">
                        <h2 class="text-center my-5">Make Appointment</h2>
                        <h3 class="text-center">Are you an Existing Patient? <br> If yes, <a
                                href="{{ route('appointment.existing') }}">Click
                                Here</a> </h3>
                        <div class="row mt-5">
                            <div class="form-group mb-4 col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="firstname" class="form-control" id="firstname"
                                        placeholder="Firstname" value="{{ old('firstname') }}" required>
                                    <label for="floatingPassword">First Name</label>
                                </div>
                                <span class="text-danger" id="fnameWarn" style="display:none;">Please enter valid
                                    firstname</span>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="lastname" class="form-control" id="lastname"
                                        placeholder="lastname" value="{{ old('lastname') }}" required>
                                    <label for="floatingPassword">Last Name</label>
                                </div>
                                <span class="text-danger" id="lnameWarn" style="display:none;">Please enter valid
                                    lastname</span>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                                        <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                                    </select>
                                    <label>Gender</label>
                                </div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="birthdate" class="form-control" id="birthdate"
                                        value="{{ old('birthdate') }}" max="{{ date('Y-m-d') }}" placeholder="birthdate"
                                        required>
                                    <label for="floatingPassword">Birthdate</label>
                                </div>
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="age" class="form-control" id="age"
                                        value="{{ old('age') ?? 0 }}" placeholder="age" readonly>
                                    <label for="floatingPassword">Age</label>
                                </div>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <div class="form-floating col-10">
                                        <input type="text" name="contact" id="contactInput" class="form-control"
                                            pattern="[0-9]{10}" value="{{ old('contact') }}" placeholder="Contact No."
                                            title="Please use this format: 9123456789" required>
                                        <label for="contactInput">Contact No.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                        placeholder="Address" required>
                                    <label for="floatingPassword">Address</label>
                                </div>
                                <span class="ms-4 text-muted">Purok, Barangay, Municipality, Province/City</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 my-5 p-3">
                        <h4 class="text-center mb-3">Select Date</h4>

                        <div class="px-2" id='calendar'></div>
                        <input type="hidden" name="selectedDate" id="selectedDate" value="{{ old('selectedDate') }}"
                            class="form-control @error('selectedDate') is-invalid @enderror" required>
                        @error('selectedDate')
                            <span class=" mt-2 text-danger text-center fw-bolder">
                                Please select a date for your appointment!
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 my-5">
                        <h4 class="text-center mb-3">Select Time</h4>

                        <h5 class="fw-bold mt-5 text-center">Morning Appointments</h5>
                        <div class="row px-2">
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="09:00:00">
                                <label class="form-check-label fw-bolder">09:00 AM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="09:30:00">
                                <label class="form-check-label fw-bolder">09:30 AM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="10:00:00">
                                <label class="form-check-label fw-bolder">10:00 AM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="10:30:00">
                                <label class="form-check-label fw-bolder">10:30 AM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="11:00:00">
                                <label class="form-check-label fw-bolder">11:00 AM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="11:30:00">
                                <label class="form-check-label fw-bolder">11:30 AM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="12:00:00">
                                <label class="form-check-label fw-bolder">12:00 AM</label>
                            </div>
                        </div>
                        <h5 class="fw-bold mt-4 text-center">Afternoon Appointments</h5>
                        <div class="row px-2">
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="14:00:00">
                                <label class="form-check-label fw-bolder">02:00 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="14:30:00">
                                <label class="form-check-label fw-bolder">02:30 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="15:00:00">
                                <label class="form-check-label fw-bolder">03:00 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="15:30:00">
                                <label class="form-check-label fw-bolder">03:30 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="16:00:00">
                                <label class="form-check-label fw-bolder">04:00 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="16:30:00">
                                <label class="form-check-label fw-bolder">04:30 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="17:00:00">
                                <label class="form-check-label fw-bolder">05:00 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="17:30:00">
                                <label class="form-check-label fw-bolder">05:30 PM</label>
                            </div>
                            <div class="form-check col-6 mb-3">
                                <input class="form-check-input" type="radio" disabled name="time_appointment"
                                    value="18:00:00">
                                <label class="form-check-label fw-bolder">06:00 PM</label>
                            </div>

                            @error('time_appointment')
                                <span class="text-danger text-center fw-bolder">
                                    Please select a time for your appointment!
                                </span>
                            @enderror
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-12">SUBMIT APPOINTMENT</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection

@section('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const selectedDateInput = document.getElementById('selectedDate');
            const time_appointments = document.getElementsByName('time_appointment');

            var businessHours = {!! json_encode($businessHours) !!};

            var disabledDates = businessHours.map(date => {
                // Convert the Y-m-d formatted date to a Date object
                return new Date(date);
            });


            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    selectedDateInput.value = info.startStr;
                    console.log('Date input changed');
                    $.ajax({
                        url: '/appointment/get-appointments',
                        type: 'GET',
                        data: {
                            date: selectedDateInput.value
                        },
                        success: function(response) {
                            console.log('Ajax request successful');
                            const appointments = JSON.parse(response);
                            const appointmentTimes = appointments.map(appointment => {
                                const InputDate = new Date(appointment
                                    .appointment_date);
                                InputDate.setDate(InputDate.getDate() + 1);
                                const formattedDate = InputDate.toISOString().slice(
                                    0, 10);
                                return {
                                    id: appointment.id,
                                    date_appointment: formattedDate,
                                    time_appointment: appointment.appointment_time
                                };
                            });

                            const morningRadioButtons = document.querySelectorAll(
                                'input[value^="09:00:00"], input[value^="09:30:00"], input[value^="10:00:00"], input[value^="10:30:00"], input[value^="11:00:00"], input[value^="11:30:00"], input[value^="12:00:00"]'
                            );

                            const afternoonRadioButtons = document.querySelectorAll(
                                'input[value^="14:00:00"], input[value^="14:30:00"], input[value^="15:00:00"], input[value^="15:30:00"], input[value^="16:00:00"], input[value^="16:30:00"], input[value^="17:00:00"], input[value^="17:30:00"], input[value^="18:00:00"]'
                            );

                            // Enable all radio buttons initially
                            morningRadioButtons.forEach(radioButton => {
                                radioButton.disabled = false;
                                radioButton.parentElement.classList.remove(
                                    'text-danger');
                            });

                            afternoonRadioButtons.forEach(radioButton => {
                                radioButton.disabled = false;
                            });

                            const appointmentsOnSelectedDate = appointmentTimes.filter(
                                appointment => {
                                    return appointment.date_appointment ===
                                        selectedDateInput.value;
                                });

                            appointmentsOnSelectedDate.forEach(appointment => {
                                const timeToDisable = appointment.time_appointment;
                                const matchingRadioButton = document.querySelector(
                                    `input[value="${timeToDisable}"]`);

                                if (matchingRadioButton) {
                                    matchingRadioButton.disabled = true;
                                    matchingRadioButton.parentElement.classList.add(
                                        'text-danger');

                                }
                            });

                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                },

                headerToolbar: {
                    start: 'prev',
                    center: 'title',
                    end: 'next'
                },
                selectOverlap: false,
                aspectRatio: 1,
                handleWindowResize: true,
                contentHeight: 400,
                selectAllow: function(info) {
                    var today = new Date(); // Get the current date and time
                    var yesterday = new Date(
                        today); // Create a new date object with the current date and time
                    yesterday.setDate(yesterday.getDate() - 1); // Subtract one day from the date

                    var day = info.start.getDay(); // Get the day of the week for the selected date

                    // Check conditions for allowing the selection
                    return day !== 0 && day !== 6 && info.start > yesterday &&
                        !disabledDates.some(disabledDate => {
                            return (
                                info.start.getDate() === disabledDate.getDate() &&
                                info.start.getMonth() === disabledDate.getMonth() &&
                                info.start.getFullYear() === disabledDate.getFullYear()
                            );
                        });
                },
                dayCellClassNames: function(arg) {
                    if (arg.isPast) {
                        return 'unselectable-date';
                    }
                    if (arg.date.getDay() == 0 || arg.date.getDay() == 6) {
                        return 'unselectable-date';
                    }
                    // also check if date is in the array of disabled dates
                    if (disabledDates.some(disabledDate => {
                            return arg.date.getDate() === disabledDate.getDate() &&
                                arg.date.getMonth() === disabledDate.getMonth() &&
                                arg.date.getFullYear() === disabledDate.getFullYear();
                        })) {
                        return 'doctor-out';
                    }

                    return 'selectable-date';
                },
                unselectAuto: false,
                selectMirror: false,
                longPressDelay: 100,
                dayRender: function(arg) {
                    var today = new Date();
                    if (info.date.getDate() === today.getDate() && info.date.getMonth() === today
                        .getMonth()) {
                        info.el.style.backgroundColor =
                            'blue'; // Set the background color to blue for today's date
                        info.el.style.color = 'white'; // Set the text color to white for today's date
                    }
                },
            });
            calendar.render();
        });
    </script>

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
        const contactInput = document.getElementById('contactInput');
        const firstnameInput = document.getElementById('firstname');
        const lastnameInput = document.getElementById('lastname');
        const fnameWarn = document.getElementById('fnameWarn');
        const lnameWarn = document.getElementById('lnameWarn');
        const cNumWarn = document.getElementById('cNumWarn');


        // validate while typing, if length is not equal to 10 and if value has non-numeric characters, add is-invalid class
        contactInput.addEventListener('input', function() {
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
                fnameWarn.style.display = "block";
            } else {
                this.classList.remove('is-invalid');
                fnameWarn.style.display = "none";
            }
        });


        lastnameInput.addEventListener('input', function() {
            var inputValue = this.value;
            var isValid = /^[A-Za-z\s]+$/.test(inputValue);
            var isFirstCharSpace = /^\s/.test(inputValue); // Check if the first character is a space

            if (!isValid || isFirstCharSpace) {
                this.classList.add('is-invalid');
                lnameWarn.style.display = "block";
            } else {
                this.classList.remove('is-invalid');
                // lnameWarnText.style.display = "none";
                lnameWarn.style.display = "none";
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $('.custom-modal').modal('show');
        });
    </script>
@endsection
