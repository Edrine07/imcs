@extends('layouts.admin')
@section('content')
<div class="container grid px-6 mx-auto">

    <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
        Prescription
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-sm shadow-xl dark:bg-gray-800">
        <div class="w-full lg:max-w-full lg:flex">
            <div
                class="border-s-4 pb-4 rounded-md  bg-blue-100 text-white mt-4 border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-1">
                    <div class="text-gray-700 font-semibold text-lg">Patient Information</div>
                </div>
            </div>
        </div>
        <form action="{{ route('patient.store') }}" method="POST">
            @csrf
            <div class="flex mt-8 mx-4 flex-wrap">
                <div class=" md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400"></span>First Name
                        <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_first_name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_first_name }}"/>
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_first_name')
                                The name field is required.
                                @enderror
                              </span>
                    </label>
                </div>

                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Last Name
                            <span class="text-red-500">&nbsp;*</span>
                            <input name="patient_last_name"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $patients->patient_last_name }}"/>
                                <span class="text-xs text-red-600 dark:text-red-400">
                                    @error('patient_last_name')
                                    The name field is required.
                                    @enderror
                                  </span>
                    </label>
                </div>
            </div>
            <div class="flex mt-1 flex-wrap">
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Gender
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <select name="patient_gender"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>-- Select Gender --</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    <span class="text-xs text-red-600 dark:text-red-400">
                        @error('patient_gender')
                        The gender field is required.
                        @enderror
                      </span>
                    </label>
                </div>
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Age
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_age"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_age }}" />
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_age')
                                The age field is required.
                                @enderror
                              </span>
                    </label>
                </div>
            </div>
            <div class="flex mt-1 flex-wrap">
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Contact No.
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_contact"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_contact }}"/>
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_contact')
                                The contact field is required.
                                @enderror
                              </span>
                    </label>
                </div>
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Current Address
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_address"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_address }}"/>
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_address')
                                The address field is required.
                                @enderror
                              </span>
                    </label>
                </div>
            </div>

            <div
                class="border-s-4 rounded-md  bg-blue-100 text-white mt-6 border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="">
                    <div class="text-gray-700 font-semibold text-lg">Vital Information</div>
                </div>
            </div>

            <div class="flex mt-8 mx-4 flex-wrap">
                <div class=" md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400"></span>Blood Pressure
                        <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_bp"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_bp }}" />
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_bp')
                                The blood pressure field is required.
                                @enderror
                              </span>
                    </label>
                </div>

                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Cardiac Rate
                            <span class="text-red-500">&nbsp;*</span>
                            <input name="patient_cr"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $patients->patient_cr }}" />
                                <span class="text-xs text-red-600 dark:text-red-400">
                                    @error('patient_cr')
                                    The cardiac rate field is required.
                                    @enderror
                                  </span>
                    </label>
                </div>
            </div>
            <div class="flex mt-1 flex-wrap">
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Respiratory Rate
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_rr"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_rr }}" />
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_rr')
                                The respiratory rate field is required.
                                @enderror
                              </span>
                    </label>
                </div>
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Temperature
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_t"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_t }}" />
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_t')
                                The temperature field is required.
                                @enderror
                              </span>
                    </label>
                </div>
            </div>
            <div class="flex mt-1 flex-wrap">
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Height
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_ht"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_ht }}"/>
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_ht')
                                The height field is required.
                                @enderror
                              </span>
                    </label>
                </div>
                <div class="w-full md:w-1/2 pr-2 mb-6 md:mb-0">
                    <label class="block font-medium text-sm">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Weight
                        </span> <span class="text-red-500">&nbsp;*</span>
                        <input name="patient_wt"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ $patients->patient_wt }}" />
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('patient_wt')
                                The weight field is required.
                                @enderror
                              </span>
                    </label>
                </div>
            </div>

            <div class="py-4 flex ">
                <button type="submit"
                class="py-3 px-4 mb-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    Add New Patient
                </button>
            </div>
    </div>
    </form>
</div>
</div>
@endsection
