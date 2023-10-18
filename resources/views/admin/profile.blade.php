@extends('layouts.admin')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Profile
        </h2>


        {{-- Current Profile --}}

        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Profile
                </h4>
                <div class="p-1">
                    <img class="rounded w-40 h-40" src="{{ asset('assets/img/gallery1.jpg') }}" alt="Clinic Image">
                </div>

                {{-- <ul>

                    <li class="p-1">
                        <h5 class="mb-5 font-light text-black dark:text-gray-300">
                            Name <p class="text-gray-600 dark:text-gray-400">Dr. Leonardo Carpio</p>
                        </h5>
                    </li>
                    <li class="p-1">
                        <h5 class="mb-5 font-light text-black dark:text-gray-300">
                            Email <p class="text-gray-600 dark:text-gray-400">admin@gmail.com</p>
                        </h5>
                    </li>
                    <li class="p-1">
                        <h5 class="mb-5 font-light text-black dark:text-gray-300">
                            Phone <p class="text-normal text-gray-600 dark:text-gray-400">09632040284</p>
                        </h5>
                    </li>
                </ul> --}}



                {{-- Edit Profile --}}

            </div>
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    PROFILE INFORMATION
                </h4>
                <ul>

                    <li class="p-1">
                        <h5 class="mb-2 font-light text-black dark:text-gray-300">
                            Name
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Dr. Leonardo Carpio</p>
                        </h5>
                    </li>
                    <li class="p-1">
                        <h5 class="mb-2 font-light text-black dark:text-gray-300">
                            Email <p class="mt-1 text-gray-600 dark:text-gray-400">admin@gmail.com</p>
                        </h5>
                    </li>
                    <li class="p-1">
                        <h5 class="mb-2 font-light text-black dark:text-gray-300">
                            Phone <p class="mt-1 text-normal text-gray-600 dark:text-gray-400">09632040284</p>
                        </h5>
                    </li>
                </ul>
                </form>
            </div>
        </div>

        {{-- Change Password --}}
        <div class="px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h5 class="mb-5 font-semibold text-gray-600 dark:text-gray-300">
                Change Password
            </h5>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Current Password</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="" />
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">New Password</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="" />
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="" />
            </label>
            <button
                class="px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Submit
            </button>
        </div>
    </div>
    </div>
@endsection
