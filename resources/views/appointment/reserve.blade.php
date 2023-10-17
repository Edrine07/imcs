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
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 100vh;">
        <div class="d-flex flex-wrap justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-3 me-3">
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
                                        <input type="text" name="firstname" id="" class="form-control"
                                            placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastname" id="" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" id="" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Birthdate</label>
                                        <input type="date" name="birthdate" id="" class="form-control"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Age</label>
                                        <input type="number" name="age" id="" class="form-control"
                                            placeholder="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Contact Number</label>
                                        <input type="number" name="contact" id="" class="form-control"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" id="" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <div class="row mt-4">
                                    <div class="form-group">
                                        <label class="form-label">Find Patient ID</label>
                                        <input type="text" name="" id="" class="form-control"
                                            placeholder="First Name">
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
                        </div>
                        <div class="row mt-2">
                            <h6>MORNING APPOINTMENT</h6>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        09:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        09:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        10:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        10:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        11:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        11:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        12:00
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <h6>AFTERNOON APPOINTMENT</h6>
                            <div class="d-flex flex-wrap">
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        02:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        02:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        03:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        03:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        04:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        04:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        05:00
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        05:30
                                    </label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        06:00
                                    </label>
                                </div>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });
        </script>
</body>

</html>
