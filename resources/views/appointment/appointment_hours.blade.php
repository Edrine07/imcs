@extends('layouts.admin')
@section('content')
    <div class="container px-6 mx-auto">
        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
            BUSINESS SCHEDULE
        </h2>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="card bg-white">
                <div class="card-body p-5">
                    <div id='calendar'></div>
                </div>
            </div>
            <div class="card bg-white">
                <div class="card-body p-5">
                    <div>
                        <label for="from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From</label>
                        <input type="date" id="from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
                    </div>
                    <div class="mt-3">
                        <label for="from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To</label>
                        <input type="date" id="from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
                    </div>
                    <div>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-4 w-full focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            SAVE
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const selectedDateInput = document.getElementById('selectedDate');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 450,
                contentHeight: 600,
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
@endpush
