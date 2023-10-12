@extends('layouts.admin')
@section('content')
    <div class="container px-6 mx-auto">
        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Schedule
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <div class="container mx-auto">
                <h1 class="text-center text-2xl font-bold my-6">
                    Business Hours
                </h1>

                <div class="flex justify-center">

                    <form action="{{ route('appointment_hours.update') }}" method="post" class="w-full max-w-screen-md">
                        @csrf

                        @foreach ($businessHours as $businessHour) 
                        <div class="flex gap-2 items-center justify-center my-4">
                            <h1 class="px-2">
                                {{ $businessHour->day }}
                            </h1>
                            <div class="w-1/4 pr-2 pb-6">

                                <h4 class="px-2">
                                    From
                                </h4>
                            </div>
                            <input type="hidden" name="data[{{ $businessHour->day }}][day]" value="{{ $businessHour->day }}">
                            <div class="w-1/4 pb=6">
                                <input type="time" class="border rounded px-2 py-1" value="{{ $businessHour->from }}" name="data[{{ $businessHour->day }}][from]" placeholder="From">
                            </div>
                            <div>
                                <h4 class="px-4">
                                    To
                                </h4>
                            </div>

                            <div class="w-1/5">
                                <input type="time" class="border rounded px-2 py-1" value="{{ $businessHour->to }}" name="data[{{ $businessHour->day }}][to]" placeholder="To">
                            </div>
                            <h4 class="px-4">
                                Interval
                            </h4>
                            <div class="w-1/12">
                                <input type="number" class="border rounded px-2 py-1" name="data[{{ $businessHour->day }}][step]" value="{{ $businessHour->step }}" placeholder="Step" >
                            </div>
                            <h4 class="px-4">

                            </h4>

                            <div class="w-1/4">
                                <label class="flex items-center space-x-2">
                                    <input value="true" name="data[{{ $businessHour->day }}][off]" class="form-checkbox" type="checkbox" @checked($businessHour->off)/>
                                    <span>OFF</span>
                                </label>
                            </div>
                        </div>
                        @endforeach

                        

                        <button
                                class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                type="submit">
                                Save
                        </button>
                    </form>
                </div>
            </div>

            {{-- <div class="flex items-center">
                <form class="w-full max-w-xs">
                  <div class="md:flex md:flex-col md:space-y-2 px-3">
                    <div class="mb-6">
                        <h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Monday
                        </h2>
                    </div>
                    <div class="mb-6">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="from-time">
                        From
                      </label>
                      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 input-sm" id="from-time" type="time">
                    </div>
                    <div class="mb-6">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="to-time">
                        To
                      </label>
                      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 input-sm" id="to-time" type="time">
                    </div>
                    </div> --}}
        </div>
    </div>

    </div>
@endsection
