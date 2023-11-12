@extends('layouts.admin')

@section('styles')
    <style>
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
@endsection

@section('content')
    <div class="container px-6 mx-auto">
        <h2 class="my-4 fs-5 fw-semibold text-gray-700">
            BUSINESS SCHEDULE
        </h2>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div id='calendar'></div>
                        <input type="hidden" id="selectedDate">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div>
                            <label for="from" class="form-label">From</label>
                            <input type="time" id="from" class="form-control rounded-lg" placeholder="From"
                                required>
                        </div>
                        <div class="mt-3">
                            <label for="to" class="form-label">To</label>
                            <input type="time" id="to" class="form-control rounded-lg" placeholder="To" required>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary w-100">SAVE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection
