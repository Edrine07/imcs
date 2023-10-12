@extends('layouts.admin')
@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">

        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">

        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-1">
            <!-- Card -->
            <div class="p-6 bg-white rounded-sm shadow-xl dark:bg-gray-800">
                <div class="flex justify-between items-center">
                    <div class="text-lg pb-4 font-semibold text-gray-700 dark:text-gray-200">
                        Patient Information
                    </div>
                    <div>
                        <a href=""
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Edit Profile
                        </a>
                    </div>
                </div>
                <div class="flex mt-8 flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                    </thead>
                                    <tbody class="divide-y min-w-full divide-gray-200 dark:divide-gray-700">
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                Name : </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $patient->patient_first_name }} {{ $patient->patient_last_name }} </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                Contact : </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $patient->patient_contact }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                Age : </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $patient->patient_age }} </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                Gender : </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $patient->patient_gender }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                Address : </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $patient->patient_address }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-sm shadow-xl dark:bg-gray-800">
                <div class="text-lg mb-6 pb-4 font-semibold text-gray-700 dark:text-gray-200">
                    Patient Findings
                </div>
                <div class="">
                    <button
                        class="py-2 text-gray-700 font-semibold text-md border-b-4 border-blue-700 hover:bg-blue-700 focus:outline-none tab-button"
                        onclick="showTab('tab1')">Vital Information</button>
                    <button
                        class="px-6 py-2 text-gray-700 font-semibold text-md border-b-4 border-blue-700 hover:bg-blue-700 focus:outline-none tab-button"
                        onclick="showTab('tab2')">Consultation</button>
                    <button
                        class="px-6 py-2 text-gray-700 font-semibold text-md border-b-4 border-blue-700 hover:bg-blue-700 focus:outline-none tab-button"
                        onclick="showTab('tab3')">Prescription</button>
                </div>
                <div id="tab1" class="p-2 tab-content bg-white">
                    <div class="flex mt-2 flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y  dark:divide-gray-700">
                                        <thead>
                                        </thead>
                                        <tbody class="divide-y min-w-full dark:divide-gray-100">
                                            <tr class=" bg-gray-100 ">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    Blood Pressure</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $patient->patient_bp }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                            </tr>

                                            <tr class=" bg-white dark:hover:bg-gray-700">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    Cardiac Rate</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $patient->patient_cr }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                            </tr>

                                            <tr class=" bg-gray-100 ">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    Respiratory Rate</td>
                                                <td
                                                    class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $patient->patient_rr }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                            </tr>

                                            <tr class=" bg-white dark:hover:bg-gray-700">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    Temperature </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $patient->patient_t }} </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                            </tr>

                                            <tr class=" bg-gray-100 ">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    Height</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $patient->patient_wt }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                            </tr>

                                            <tr class=" bg-white dark:hover:bg-gray-700">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    Weight</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $patient->patient_wt }} </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700" href="#"></a>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="p-4 tab-content bg-white hidden">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase dark:text-gray-400">
                                                    Date</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase dark:text-gray-400">
                                                    </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase dark:text-gray-400">
                                                    </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    01/01/2023</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                   </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                        View
                                                      </button>
                                                </td>
                                                <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                               </td>
                                               <td
                                               class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                              </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="p-4 tab-content bg-white hidden">
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase dark:text-gray-400">
                                                        Date</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase dark:text-gray-400">
                                                        </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase dark:text-gray-400">
                                                        </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        01/01/2023</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                       </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                            View
                                                          </button>
                                                    </td>
                                                    <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                   </td>
                                                   <td
                                                   class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                  </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>

        <style>
            .tab-button.active {
                background-color: #fff;
                border-color: #4299e1;
                color: #4299e1;
            }
        </style>

        <script>
            function showTab(tabId) {
                    // Hide all tab content
                    const tabContents = document.querySelectorAll('.tab-content');
                    tabContents.forEach((content) => {
                        content.classList.add('hidden');
                    });

                    // Show the selected tab content
                    const selectedTab = document.getElementById(tabId);
                    if (selectedTab) {
                        selectedTab.classList.remove('hidden');
                    }

                    // Remove the 'active' class from all tab buttons
                    const tabButtons = document.querySelectorAll('.tab-button');
                    tabButtons.forEach((button) => {
                        button.classList.remove('active');
                    });

                    // Add the 'active' class to the clicked tab button
                    const clickedButton = document.querySelector(`[onclick="showTab('${tabId}')"]`);
                    if (clickedButton) {
                        clickedButton.classList.add('active');
                    }
                }

                // Initialize the first tab
                showTab('tab1');
        </script>
    </div>

</main>
@endsection
