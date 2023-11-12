<!DOCTYPE html>

<html lang="en">

<head>
    <base href="../">
    <title>Immaculate Medico Surgical Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('metro-assets/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metro-assets/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metro-assets/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metro-assets/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('images/imcs.svg') }}" type="image/x-icon">
    <style>
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
    @yield('styles')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            @include('includes.desktop-sidebar')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('includes.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2023©</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-gray-800 text-hover-primary">Immaculate Clinic</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('metro-assets/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('metro-assets/assets/js/custom/modals/upgrade-plan.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/apps/customers/list/export.js') }}"></script> --}}
    <script src="{{ asset('assets/js/custom/apps/customers/list/list.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/apps/customers/add.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom/modals/new-target.js') }}"></script>    --}}

    @yield('scripts')
</body>

</html>
