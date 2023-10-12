@extends('layouts.admin')
@section('content')
   <main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Patient List
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-md">
            <div class="w-full overflow-x-auto">
                <div class="px-4 py-6  bg-white rounded-md shadow-md dark:bg-gray-800">
                    <div class="relative w-full mr-6">
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            <div class="flex w-full justify-between mr-6 items-center mb-4">
                                <div>
                                    <a href="{{ route('patient.create') }}"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        Add Patient
                                    </a>
                                </div>
                                <div class=" w-1/3 relative max-w-xl mr-6 focus-within:text-purple-500">
                                    <form method="GET">
                                        <div class="absolute inset-y-0 flex items-center pl-2">
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input
                                            class="w-full pl-8 pr-2 text-sm text-gray-500 placeholder-gray-600 bg-white border-2 rounded-md dark:placeholder-gray-300 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                            type="text" placeholder="Search" name="search"
                                            value="{{ request()->get('search') }}" aria-label="Search" />
                                    </form>
                                </div>
                            </div>
                    </div>
                    </h4>
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr
                                class=" text-xs font-medium tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-white dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Patient ID</th>
                                <th class="px-4 py-3">Patient Name</th>
                                <th class="px-4 py-3">Contact No.</th>
                                <th class="px-4 py-3">Option</th>
                            </tr>
                        </thead>

                        <tbody class=" divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($patients as $patient)
                            <tr class="text-gray-700 font-thin dark:text-gray-400">
                                <td class="px-4 font-thin py-4 text-sm">
                                    {{ $patient->id }}
                                </td>
                                <td class="px-4 py-4 text-sm">
                                    {{ $patient->patient_first_name }} {{ $patient->patient_last_name }}
                                </td>
                                <td class="px-4 py-4 text-sm">
                                    {{ $patient->patient_contact }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('patient.edit', $patient->id) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('patient.show', $patient->id) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <a href=""
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</main>
    @endsection
