@extends('layouts.guest')

@section('styles')
    <style>
        .fc-toolbar-title {
            font-size: 15px !important;
        }

        .fc-button {
            font-size: 10px !important;
        }

        #calendar a {
            color: #303030;
            text-decoration: none;
        }

        .fc-daygrid-day-events {
            display: none;
        }

        .fc-highlight {
            background: rgb(78, 145, 239) !important;
        }

        #calendar .unselectable-date {
            background-color: rgb(202, 200, 200);
        }

        #calendar .unselectable-date a {
            color: rgb(136, 133, 133);
        }

        #calendar .selectable-date {
            background-color: rgb(214, 250, 214);
        }
    </style>
    @livewireStyles
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

        <div class="container mt-5 d-flex justify-content-center align-items-center">
            <div class="row bg-white rounded rounded-3 shadow p-4">
                <x-success></x-success>
                <x-error></x-error>
                <div class="col-md-4">
                    <h2 class="text-center my-5">Make Appointment</h2>
                    <h3 class="text-center">Are you a New Patient? <br> If yes, <a
                            href="{{ route('appointment.appointment') }}">Click Here</a> </h3>
                    <livewire:find-patient />
                    @error('patientId')
                        <span class="text-danger text-center fw-bolder">
                            Patient not found. Please check your details!
                        </span>
                    @enderror
                </div>

                <div class="col-md-8">
                    <form action="{{ route('appointment.existing-store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="patientId" id="patientId" value=""
                                class="@error('patientId') is-invalid @enderror" />
                            <div class="col-md-7 my-5 p-3">
                                <h4 class="text-center mb-3">Select Date</h4>
                                <div class="px-2" id='calendar'></div>
                                <input type="hidden" name="selectedDate" id="selectedDate"
                                    value="{{ old('selectedDate') }}"
                                    class="form-control @error('selectedDate') is-invalid @enderror" required>
                                @error('selectedDate')
                                    <span class=" mt-2 text-danger text-center fw-bolder">
                                        Please select a date for your appointment!
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-5 my-5">
                                <h4 class="text-center mb-3">Select Time</h4>

                                <h5 class="fw-bold mt-5 text-center">Morning Appointments</h5>
                                <div class="row px-2">
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="09:00">
                                        <label class="form-check-label">09:00 AM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="09:30">
                                        <label class="form-check-label">09:30 AM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="10:00">
                                        <label class="form-check-label">10:00 AM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="10:30">
                                        <label class="form-check-label">10:30 AM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="11:00">
                                        <label class="form-check-label">11:00 AM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="11:30">
                                        <label class="form-check-label">11:30 AM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="12:00">
                                        <label class="form-check-label">12:00 AM</label>
                                    </div>
                                </div>
                                <h5 class="fw-bold mt-4 text-center">Afternoon Appointments</h5>
                                <div class="row px-2">
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="02:00">
                                        <label class="form-check-label">02:00 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="02:30">
                                        <label class="form-check-label">02:30 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="03:00">
                                        <label class="form-check-label">03:00 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="03:30">
                                        <label class="form-check-label">03:30 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="04:00">
                                        <label class="form-check-label">04:00 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="04:30">
                                        <label class="form-check-label">04:30 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="05:00">
                                        <label class="form-check-label">05:00 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="05:30">
                                        <label class="form-check-label">05:30 PM</label>
                                    </div>
                                    <div class="form-check col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="06:00">
                                        <label class="form-check-label">06:00 PM</label>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @livewireScripts

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const selectedDateInput = document.getElementById('selectedDate');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    selectedDateInput.value = info.startStr;
                    console.log('Date input changed');
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
                    var today = new Date();
                    var yesterday = new Date(today);
                    yesterday.setDate(yesterday.getDate() - 1);
                    var day = info.start.getDay();
                    return day != 0 && day != 6 && info.start > yesterday;
                },
                dayCellClassNames: function(arg) {
                    if (arg.isPast) {
                        return 'unselectable-date';
                    }
                    if (arg.date.getDay() == 0 || arg.date.getDay() == 6) {
                        return 'unselectable-date';
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
        document.addEventListener('DOMContentLoaded', () => {
            const patientIdInput = document.getElementById('patientId');

            document.addEventListener('patientFound', (event) => {
                const patientId = event.detail;
                patientIdInput.value = patientId;
            });
        });
    </script>

    <script>
        const firstnameInput = document.getElementById('firstname');
        const lastNameInput = document.getElementById('lastname');

        firstnameInput.addEventListener('input', function() {
            var inputValue = this.value;
            var isValid = /^[A-Za-z\s]+$/.test(inputValue);
            var isFirstCharSpace = /^\s/.test(inputValue);

            if (!isValid || isFirstCharSpace) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });


        lastNameInput.addEventListener('input', function() {
            var inputValue = this.value;
            var isValid = /^[A-Za-z\s]+$/.test(inputValue);
            var isFirstCharSpace = /^\s/.test(inputValue);

            if (!isValid || isFirstCharSpace) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    </script>
@endsection
