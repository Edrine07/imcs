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
                                        <button @click="openModal"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            ADD MEDICINE
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </h4>
                        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr
                                    class=" text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Medicine Name</th>
                                    <th class="px-4 py-3">Medicine Type.</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>

                            <tbody class=" divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($meds as $med)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-4 text-sm"> {{ $med->medicine_name }}</td>
                                        <td class="px-4 py-4 text-sm"> {{ $med->medicine_type }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">

                                                <button data-modal-target="defaultModal"
                                                    data-modal-toggle="defaultModal{{ $med->id }}"
                                                    class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"
                                                    type="button">
                                                    Edit
                                                </button>
                                                <a href="{{ route('appointment.cancel', $med->id) }}"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-1 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Main modal -->
                                    <div id="defaultModal{{ $med->id }}" tabindex="-1" aria-hidden="true"
                                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Update Medicine
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="defaultModal{{ $med->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6">

                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-hide="defaultModal" type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                                    <button data-modal-hide="defaultModal{{ $med->id }}" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>

    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <form action="{{ route('med-list.store') }}" method="POST">
                    @csrf
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label class="block font-medium text-sm"></label>
                            <span class="text-sm text-gray-700 dark:text-gray-400">Medecine
                            </span> <span class="text-red-500">&nbsp;*</span>
                            <input name="medicine_name"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Medicine Name" />
                        </div>
                        <div class="flex-1 mb-6">
                            <label class="block font-medium text-sm"></label>
                            <span class="text-sm text-gray-700 dark:text-gray-400">Type
                            </span> <span class="text-red-500">&nbsp;*</span>
                            <input name="medicine_type"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Medicine Type" />
                        </div>
                    </div>
            </div>
            <footer
                class="flex mb-2 flex-col items-center justify-end px-6 py-3 -mx-6  space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Cancel
                </button>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    ADD MEDICINE
                </button>
            </footer>
        </div>
        </form>
    </div>
@endsection
