@extends('layouts.admin')
@section('content')
<div class="container grid px-6 mx-auto">

    <h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
        Create Prescription
    </h2>


    <div class="px-4 py-1 mb-8 bg-white rounded-sm shadow-xl dark:bg-gray-800">
        <div class="w-full lg:max-w-full  lg:flex">
            <div
                class="border-s-4 pb-4 rounded-md  bg-blue-100 mt-4 border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-1">
                    <div class="text-gray-700 font-semibold text-lg">Prescription Details</div>
                </div>
            </div>
        </div>


        <div class="flex mt-8 mx-4 flex-wrap">
            <div class=" md:w-1/2 pr-2 mb-6 md:mb-0">
            <label class="block font-medium text-sm">
                    <span class="text-sm text-gray-700 dark:text-gray-400">Name
                    </span> <span class="text-red-500">&nbsp;*</span>
                    <select name="patient_gender"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    @foreach ($data as $row)
                    <option value="{{ $row->id }}"> {{ $row->patient_first_name }} {{ $row->patient_last_name }}</option>
                    @endforeach

                </select>
                </label>
            </div>

            <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                <label class="block font-medium text-sm">
                    <span class="text-sm text-gray-700 dark:text-gray-400">Visit Date
                        <span class="text-red-500">&nbsp;*</span>
                        <input type="date" name="visit_date"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter Last Name" />
                </label>
            </div>
        </div>
        <div class="flex mt-1 flex-wrap">
            <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                <label class="block font-medium text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Symptoms</span> <span
                        class="text-red-500">&nbsp;*</span>
                    <textarea name="symtoms"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Enter some long form content."></textarea>
                </label>
            </div>
            <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                <label class="block font-medium text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Diagnosis</span> <span
                        class="text-red-500">&nbsp;*</span>
                    <textarea name="diagnosis"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Enter some long form content."></textarea>
                </label>
            </div>
        </div>
        <div


 <div class="container mx-auto">

            <div
                class="border-s-4 mb-4 rounded-md  bg-blue-100 mt-4 border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-1">
                    <div class="text-gray-700 font-semibold text-lg">Prescribe Medicine</div>
                </div>
            </div>

           <button @click="openModal"
            class="py-3 px-4 mb-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Add
            Medicine</button>

    <div
      x-show="isModalOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    >
      <!-- Modal -->
      <div
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modal"
      >
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
          <button
            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
            aria-label="close"
            @click="closeModal"
          >
            <svg
              class="w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              role="img"
              aria-hidden="true"
            >
              <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
                fill-rule="evenodd"
              ></path>
            </svg>
          </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
        <form action="" method="POST">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block font-medium text-sm"></label>
                    <span class="text-sm text-gray-700 dark:text-gray-400">Medecine
                    </span> <span class="text-red-500">&nbsp;*</span>
                    <input name="medicine_name[]"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Medicine Name" />
                </div>
                <div class="flex-1 mb-6">
                    <label class="block font-medium text-sm"></label>
                    <span class="text-sm text-gray-700 dark:text-gray-400">Type
                    </span> <span class="text-red-500">&nbsp;*</span>
                    <input name="medicine_type[]"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Medicine Type" />
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block font-medium text-sm"></label>
                    <span class="text-sm text-gray-700 dark:text-gray-400">Dose
                    </span> <span class="text-red-500">&nbsp;*</span>
                    <input name="medicine_dose[]"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Medecine Dose" />
                </div>
                <div class="flex-1">
                    <label class="block font-medium text-sm"></label>
                    <span class="text-sm text-gray-700 dark:text-gray-400">Unit Per Day
                    </span> <span class="text-red-500">&nbsp;*</span>
                    <input name="unit_per_day[]"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Unit Per Day" />
                </div>
                <div class="flex-1">
                    <label class="block font-medium text-sm"></label>
                    <span class="text-sm text-gray-700 dark:text-gray-400">Duration
                    </span> <span class="text-red-500">&nbsp;*</span>
                    <input name="duration[]"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Duration" />
                </div>
            </div>
        </div>
        <footer
          class="flex mb-2 flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
        >
          <button
            @click="closeModal"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Cancel
          </button>
          <button type="submit"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple"
          >
            Add
          </button>
        </footer>
      </div>
    </form>
</div>
<table class="w-full mb-6 divide-y pb-4 divide-gray-200 dark:divide-gray-700">
    <thead>
        <tr
            class=" text-xs border font-medium tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-white dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 border py-3">Medicine Name</th>
            <th class="px-4 border py-3">Type</th>
            <th class="px-4 border py-3">Dose</th>
            <th class="px-4 border py-3">Unit Per Day</th>
            <th class="px-4 border py-3">Duration</th>
        </tr>
    </thead>

    <tbody class=" divide-y divide-gray-200 dark:divide-gray-700">
        <tr class="text-gray-700 border font-thin dark:text-gray-400">
            <td class="px-4 border font-thin py-4 text-sm">
                fv
            </td>
            <td class="px-4 border py-4 text-sm">
                gh
            </td>
            <td class="px-4 border py-4 text-sm">
                fgg
            </td>
            <td class="px-4 border py-4 text-sm">
                fgg
            </td>
            <td class="px-4 border py-4 text-sm">
                fgg
            </td>
        </tr>
    </tbody>
</table>


        </div>
@endsection
