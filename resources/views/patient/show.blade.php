@extends('layouts.admin')

@section('styles')
    <style>
        .tab-button.active {
            background-color: #fff;
            border-color: #4299e1;
            color: #4299e1;
        }
    </style>
@endsection

@section('content')
    <main class="container">
        <div class="grid gap-6 mt-8 md:grid-cols-2 xl:grid-cols-1">
            <div class="p-6 bg-white rounded-sm shadow-md dark:bg-gray-800">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg pb-4 font-semibold text-gray-700 dark:text-gray-200">
                        Patient Information
                    </h2>
                </div>

                <div class="flex mt-8 flex-col">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-gray-800 dark:text-gray-200">Name :</th>
                                <td>{{ $patient->full_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-gray-800 dark:text-gray-200">Contact :</th>
                                <td>{{ $patient->contact }}</td>
                            </tr>
                            <tr>
                                <th class="text-gray-800 dark:text-gray-200">Age :</th>
                                <td>{{ $patient->age }}</td>
                            </tr>
                            <tr>
                                <th class="text-gray-800 dark:text-gray-200">Gender :</th>
                                <td>{{ $patient->gender }}</td>
                            </tr>
                            <tr>
                                <th class="text-gray-800 dark:text-gray-200">Address :</th>
                                <td>{{ $patient->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-6 bg-white rounded-sm shadow-md dark:bg-gray-800">
                <div class="text-lg mb-6 pb-4 font-semibold text-gray-700 dark:text-gray-200">
                    Patient Findings
                </div>
                <div class="mb-4">
                    <button class="btn btn-outline-primary" onclick="showTab('tab1')">Vital Information</button>
                    <button class="btn btn-outline-primary" onclick="showTab('tab2')">Consultation</button>
                    <button class="btn btn-outline-primary" onclick="showTab('tab3')">Prescription</button>
                </div>
                {{-- <div id="tab1" class="tab-content bg-white">
                </div>
                <div id="tab2" class="tab-content bg-white hidden">
                </div>
                <div id="tab3" class="tab-content bg-white hidden">
                </div> --}}
                <div id="tab1" class="p-2 tab-content bg-white">
                    <div class="d-flex mt-2 flex-column">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-3 py-2 text-sm font-weight-bold text-gray-800">Blood Pressure</th>
                                        <th class="px-3 py-2 text-sm text-gray-800"></th>
                                        <th class="px-3 py-2 text-sm text-gray-800">
                                            {{-- $patient->patient_bp --}}
                                        </th>
                                        <th class="px-3 py-2 text-right text-sm font-weight-bold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white">
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">Cardiac Rate</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800">
                                            {{-- $patient->patient_cr --}}
                                        </td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <a href="#" class="text-blue-500">View</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">Respiratory Rate</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800">
                                            {{-- $patient->patient_rr --}}
                                        </td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <a href="#" class="text-blue-500">View</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">Temperature</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800">
                                            {{-- $patient->patient_t --}}
                                        </td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <a href="#" class="text-blue-500">View</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">Height</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800">
                                            {{-- $patient->patient_wt --}}
                                        </td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <a href="#" class="text-blue-500">View</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">Weight</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800">
                                            {{-- $patient->patient_wt --}}
                                        </td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <a href="#" class="text-blue-500">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab2" class="p-4 tab-content bg-white d-none">
                    <div class="d-flex flex-column">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="px-3 py-2 text-left text-sm font-weight-bold text-gray-500">Date</th>
                                        <th class="px-3 py-2 text-left text-sm font-weight-bold text-gray-500"></th>
                                        <th class="px-3 py-2 text-left text-sm font-weight-bold text-gray-500"></th>
                                        <th class="px-3 py-2 text-right text-sm font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">01/01/2023</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <button type="button" class="btn btn-primary">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab3" class="p-4 tab-content bg-white d-none">
                    <div class="d-flex flex-column">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="px-3 py-2 text-left text-sm font-weight-bold text-gray-500">Date</th>
                                        <th class="px-3 py-2 text-left text-sm font-weight-bold text-gray-500"></th>
                                        <th class="px-3 py-2 text-left text-sm font-weight-bold text-gray-500"></th>
                                        <th class="px-3 py-2 text-right text-sm font-weight-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-3 py-2 text-sm font-weight-bold text-gray-800">01/01/2023</td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-sm text-gray-800"></td>
                                        <td class="px-3 py-2 text-right text-sm font-weight-bold">
                                            <button type="button" class="btn btn-primary">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        function showTab(tab) {
            var tabcontent = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.add("d-none");
            }
            document.getElementById(tab).classList.remove("d-none");
        }
    </script>
@endsection
