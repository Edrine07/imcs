@extends('layouts.admin')
@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Medical Record
            </h2>

            <div class="px-10 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="bg-white">
                    <div class="p-4">
                        <div class="p-2">
                            <h1 class="text-2xl font-bold text-center">Immaculate Medico-Surgical Clinic</h1>
                        </div>
                        <div class="p-2 ">
                            <h1 class="text-lg font-semibold text-center">Padre Diaz St. Zone 6, Bulan, Sorsogon</h1>
                        </div>
                    </div>
                    <div class="flex justify-between p-4 gap-10">

                        <div class="pt-5">
                            <h6 class="font-bold pb-2 text-md">NAME : <span class="text-md font-medium">{{ $patients->patient_name }}</span>
                            </h6>
                            <h6 class="font-bold pb-2 text-md">ADDRESS : <span class="text-md font-medium">{{ $patients->patient_address }}</span></h6>
                            <h6 class="font-bold pb-2 text-md">CONTACT NUMBER : <span class="text-md font-medium">{{ $patients->patient_number }}</span></h6>
                            <h6 class="font-bold pb-2 text-md">DATE : <span class="text-md font-medium">{{ $patients->patient_date }}</span>
                        </div>
                        <div class="pt-5 pl-4">
                            <h6 class="font-bold pb-2  text-md">AGE : <span class="text-md font-medium">{{ $patients->patient_age }}</span>
                            </h6>
                            <h6 class="font-bold pb-2  text-md">SEX : <span class="text-md font-medium">{{ $patients->patient_sex }}</span>
                            </h6>
                            <h6 class="font-bold pb-2  text-md">FB Page : <span class="text-md font-medium">{{ $patients->patient_fb }}</span>
                            </h6>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 mt-5 flex justify-center">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left uppercase border-b dark:bg-gray-800">
                                    <th class="px-10 border py-3 text-sm font-medium text-gray-900">BP:  <span>{{ $patients->patient_bp }}</span></th>
                                    <th class="px-10 border py-3 text-sm font-medium text-gray-900">CR:  <span>{{ $patients->patient_cr }}</span></th>
                                    <th class="px-10 border py-3 text-sm font-medium text-gray-900">RR:  <span>{{ $patients->patient_rr }}</span></th>
                                    <th class="px-10 border py-3 text-sm font-medium text-gray-900">T:  <span>{{ $patients->patient_temp }}</span></th>
                                    <th class="px-10 border py-3 text-sm font-medium text-gray-900">WT:  <span>{{ $patients->patient_wt }}</span></th>
                                    <th class="px-10 border py-3 text-sm font-medium text-gray-900">HT:  <span>{{ $patients->patient_ht }}</span></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="p-4">
                    <div class="p-2">
                        <h1 class="text-lg pt-4 font-bold text-left">Subjective</h1>
                    </div>
                    <div class="p-2 ">
                        <h1 class="text-md font-normal text-left">{{ $patients->patient_subjective }}</h1>
                    </div>

                    <div class="p-2">
                        <h1 class="text-lg pt-4 font-bold text-left">Objective</h1>
                    </div>
                    <div class="p-2 ">
                        <h1 class="text-md font-normal text-left">{{ $patients->patient_objective }}</h1>
                    </div>

                    <div class="p-2">
                        <h1 class="text-lg pt-4 font-bold text-left">Assessment</h1>
                    </div>
                    <div class="p-2 ">
                        <h1 class="text-md font-normal text-left">{{ $patients->patient_assessment }}</h1>
                    </div>

                    <div class="p-2">
                        <h1 class="text-lg pt-4 font-bold text-left">Plan</h1>
                    </div>
                    <div class="p-2 ">
                        <h1 class="text-md font-normal text-left">{{ $patients->patient_subjective }}9</h1>
                    </div>
            </div>
    </main>
@endsection
