<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appointment</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="../assets/js/init-alpine.js"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                  <h1
                    class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                  >
                    Make Appointment
                  </h1>
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                    <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Name"
                    />
                  </label>
                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Address</span>
                    <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Address"
                      type="password"
                    />
                  </label>
                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                      Age
                    </span>
                    <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Age"

                    />
                  </label>
                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                      Birthdate
                    </span>
                    <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Age"
                      type="date"

                    />
                  </label>
                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                      Phone Number
                    </span>
                    <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Phone"

                    />
                  </label>


                  <!-- You should use a button here, as the anchor is only used for the example  -->
                  <button
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit"
                  >
                    Make An Appointment
                  </button>


                </div>
              </div>
          <div class=" p-6 sm:p-12 md:w-1/2">
            <div class="w-full grid gap-x-8 gap-y-4 grid-cols-3">
                
                  <h1
                    class="mb-4 mt-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                  >
                    Available Slot
                  </h1> 

                  @foreach ($appointments as $appointment)

                  <div class="grid gap-x-8 gap-y-4 grid-cols-3">
                    <div class="mb-2">
                      <h1
                      class="mb-2 mt-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                    >
                      {{ $appointment['date'] }}
                    </h1> 
                      <h1
                      class="mb-2 mt-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                    >
                    {{ $appointment['day_name'] }}
                    </h1> 
                    @foreach ($appointment['available_hours'] as $time)
                    <form action="{{ route('appointment.reserve_appointment') }}" method="POST">
                      @csrf
                      <input type="hidden" name="date" value="{{$appointment['full_date']}}">
                      <input type="hidden" name="time" value="{{$time}}">
                      <button type="submit" class="py-1 px-2 text-xs mb-2 inline-flex justify-center items-center gap-2 rounded-md border font-thin bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                        {{$time}}
                      </button>
                    </form>
                    @endforeach
                      
                    </div>

                  @endforeach

                
                    
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>




