<!DOCTYPE html>
@notifyCss
<x-notify::notify />
@notifyJs
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Immaculate Medico-Surgical Clinic</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('../assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('./assets/js/init-alpine.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <script src="{{ asset('./assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('./assets/js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('./assets/js/focus-trap.js') }}" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <style>
    </style>

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('includes.desktop-sidebar')

        <!-- Mobile sidebar -->
        @include('includes.mobile-sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('includes.header')
            <main class="h-full overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @stack('scripts')
</body>

</html>
