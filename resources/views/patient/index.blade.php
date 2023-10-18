@extends('layouts.admin')
@section('content')
   <main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Patient List
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-md">
            <div class="w-full overflow-x-auto">
                <div class="px-4 py-6  bg-white rounded-md shadow-md dark:bg-gray-800">
                    <div class="relative w-full mr-6">
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            <div class="flex w-full justify-between mr-6 items-center mb-4">
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
                                class=" text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Patient Name</th>
                                <th class="px-4 py-3">Contact No.</th>
                                <th class="px-4 py-3">Address</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>

                        <tbody class=" divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($patients as $patient)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-4 text-sm"> {{ $patient->fullname }}</td>
                                <td class="px-4 py-4 text-sm">
                                    {{ $patient->contact }}
                                </td>
                                <td class="px-4 py-4 text-sm"> {{ $patient->address }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('patient.med-history', $patient->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 mr-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Medical History</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                               <td colspan="3" class="text-left text-gray-500 dark:text-gray-400 text-center py-3">No available data</td>
                            </tr>
                           @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</main>
    @endsection
