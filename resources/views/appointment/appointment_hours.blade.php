@extends('layouts.admin')

@section('styles')
    <style>
        .fc-daygrid-day-events {
            display: none;
        }

        .fc-highlight {
            background: rgb(239, 91, 78) !important;
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
@endsection

@section('content')
    <div class="container px-6 mx-auto">

        <h2 class="my-4 fs-5 fw-semibold text-gray-700">
            SELECT DATES THAT YOU ARE UNAVAILABLE TO CONDUCT MEDICAL SERVICES (Click on the date to select)
        </h2>
        <form action="{{ route('appointment_hours.update') }}" method="post">
            @csrf
            {{-- @method('PUT') --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="cardbody p-4">
                            <input type="hidden" id="selectedDates" class="form-control" name="appointment_dates"
                                value="" required>
                            <h5 class="card-title">Selected Dates List Unavailable to Conduct Medical Services</h5>
                            <ul id="selectedDatesList"></ul>
                            @error('selectedDates')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="my-4">
                                <button class="btn btn-primary w-100" type="submit">SAVE</button>
                            </div>
                            <x-success></x-success>
                            <x-error></x-error>
                        </div>
                    </div>
        </form>
        <div class="card my-3">
            <div class="cardbody p-4">
                <h5 class="card-title">Existing Dates Unavailable to Conduct Medical Services</h5>
                <table class="table align-middle table-row-dashed table-sm" id="kt_customers_table">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bolder text-uppercase gs-0">
                            <th>#</th>
                            <th class="min-w-100px">Date</th>
                            <th class="min-w-70px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600">
                        @forelse($businessHours as $hours)
                            <tr class="text-gray-800 text-hover-primary mb-0">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('F d, Y', strtotime($hours->date)) }}</td>
                                <td>
                                    <form action="{{ route('appointment_hours.destroy', ['hour' => $hours->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No dates selected</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
            const selectedDateInput = document.getElementById('selectedDates');
            const selectedDatesList = document.getElementById('selectedDatesList');
            var selectedDates = [];

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    var oneWeekFromToday = new Date();
                    oneWeekFromToday.setDate(oneWeekFromToday.getDate() + 7);

                    if (info.start > oneWeekFromToday) {
                        if (!selectedDates.includes(info.startStr)) {
                            selectedDates.push(info.startStr);
                            updateSelectedDates();
                        } else {
                            selectedDates = selectedDates.filter(date => date !== info.startStr);
                            updateSelectedDates();
                        }
                    } else {
                        calendar.unselect();
                    }
                },
                unselect: function(info) {
                    selectedDates = selectedDates.filter(date => date !== info.startStr);
                    updateSelectedDates();
                },
                headerToolbar: {
                    start: 'prev',
                    center: 'title',
                    end: 'next'
                },
                dayCellClassNames: function(arg) {
                    if (arg.isPast || arg.date.getDay() === 0 || arg.date.getDay() === 6 || arg.date <=
                        new Date()) {
                        return 'unselectable-date';
                    }
                    // also disable all dates within this week 
                    var oneWeekFromToday = new Date();
                    oneWeekFromToday.setDate(oneWeekFromToday.getDate() + 7);
                    if (arg.date < oneWeekFromToday) {
                        return 'unselectable-date';
                    }

                    return 'selectable-date';
                },
                // Your other calendar options...
            });

            function updateSelectedDates() {
                updateSelectedDatesInput();
                updateSelectedDatesList();
            }

            function updateSelectedDatesInput() {
                selectedDateInput.value = selectedDates.join(',');
            }

            function updateSelectedDatesList() {
                // Clear existing list items
                selectedDatesList.innerHTML = '';

                // Add new list items for each selected date
                selectedDates.forEach(dateStr => {
                    var date = new Date(dateStr);
                    var listItem = document.createElement('li');
                    listItem.textContent = date.toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    selectedDatesList.appendChild(listItem);
                });
            }
            calendar.render();

            window.saveSelectedDates = function() {
                console.log('Selected Dates:', selectedDates);
                // You can perform further actions here, like sending the data to the server.
            };
        });
    </script>
@endsection
