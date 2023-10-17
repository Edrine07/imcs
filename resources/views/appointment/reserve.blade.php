<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appointment</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

        .fc .fc-highlight {
            background: rgb(1 34 255 / 30%);
        }

        .card-header {
            background-color: #7e3af200 !important;
            border-bottom: none !important;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
            color: #303030;
            text-transform: uppercase;
        }

        .card {
            height: 550px;
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
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <form action="{{ route('appointment.reserve_appointment') }}" method="post">
            @csrf
            <div class="d-flex flex-wrap justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-12">
                    <x-success></x-success>
                </div>
                <div class="col-md-4 me-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5 class="">MAKE APPOINTMENT</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">New Patient</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Existing Patient</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="row mt-4">
                                        <div class="form-group col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="firstname"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                value="{{ old('firstname') }}">
                                            @error('firstname')
                                                <span class="small text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="lastname"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                placeholder="" value="{{ old('lastname') }}">
                                            @error('lastname')
                                                <span class="small text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Please Select</option>
                                                <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                                                <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Birthdate</label>
                                            <input type="date" name="birthdate" value="{{ old('birthdate') }}"
                                                class="form-control @error('birthdate') is-invalid @enderror"
                                                placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Age</label>
                                            <input type="number" name="age" value="{{ old('age') }}"
                                                class="form-control @error('age') is-invalid @enderror" placeholder="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact Number </label>
                                            <input type="text" name="contact" pattern="[0-9]{11}"
                                                value="{{ old('contact') }}"
                                                class="form-control @error('contact') is-invalid @enderror"
                                                placeholder="CP No. (09XX-XXX-XXXX)">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" value="{{ old('address') }}"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="row mt-4">
                                        <div class="form-group">
                                            <label class="form-label">Find Patient ID</label>
                                            <input type="text" name="patient_Id" value="{{ old('patient_Id') }}"
                                                class="form-control @error('patient_Id') is-invalid @enderror"
                                                placeholder="Patient Id">
                                            <P class="text-danger">Make this livewire or select2</P>
                                            <button class="btn btn-primary mt-2">Find Patient ID</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div id='calendar'></div>
                                <input type="hidden" name="selectedDate" id="selectedDate"
                                    value="{{ old('selectedDate') }}"
                                    class="form-control @error('selectedDate') is-invalid @enderror" required>
                                @error('selectedDate')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="row mt-2">
                                <h6>MORNING APPOINTMENT</h6>
                                <div class="d-flex flex-wrap">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="09:00">
                                        <label class="form-check-label">
                                            09:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="09:30">
                                        <label class="form-check-label">
                                            09:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="10:00">
                                        <label class="form-check-label">
                                            10:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="10:30">
                                        <label class="form-check-label">
                                            10:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="11:00">
                                        <label class="form-check-label">
                                            11:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="11:30">
                                        <label class="form-check-label">
                                            11:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="12:00">
                                        <label class="form-check-label">
                                            12:00
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <h6>AFTERNOON APPOINTMENT</h6>

                                <div class="d-flex flex-wrap">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="02:00">
                                        <label class="form-check-label">
                                            02:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="02:30">
                                        <label class="form-check-label">
                                            02:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="03:00">
                                        <label class="form-check-label">
                                            03:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="03:30">
                                        <label class="form-check-label">
                                            03:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="04:00">
                                        <label class="form-check-label">
                                            04:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="04:30">
                                        <label class="form-check-label">
                                            04:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="05:00">
                                        <label class="form-check-label">
                                            05:00
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="05:30">
                                        <label class="form-check-label">
                                            05:30
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="time_appointment"
                                            value="06:00">
                                        <label class="form-check-label">
                                            06:00
                                        </label>
                                    </div>
                                </div>
                                @error('time_appointment')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-12">SUBMIT APPOINTMENT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
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
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                selectOverlap: false,
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
</body>

</html>
