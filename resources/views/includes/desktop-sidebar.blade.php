<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('images/imsc.png') }}" class="h-30px logo" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="black" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                    class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Home</span></span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Appointment Management</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span
                        class="menu-link {{ request()->routeIs('appointment.index', 'appointment.new') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                    viewBox="0 0 24 25" fill="none">
                                    <path opacity="0.3"
                                        d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z"
                                        fill="black" />
                                    <path
                                        d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Appointment</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('appointment.new') ? 'active' : '' }}"
                                href="{{ route('appointment.new') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Today's Appointment List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('appointment.index') ? 'active' : '' }}"
                                href="{{ route('appointment.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All Appointment List</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('checkup.index') ? 'active' : '' }}"
                        href="{{ route('checkup.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M21.384 8.29703L17 12.679C16.3771 13.3013 15.6702 13.8335 14.9 14.26L10.833 16.5191C10.0628 16.9457 9.35598 17.4778 8.733 18.1L5.414 21.419C5.03767 21.795 4.52746 22.0063 3.9955 22.0063C3.46353 22.0063 2.95333 21.795 2.577 21.419C2.39056 21.2327 2.24266 21.0116 2.14175 20.7681C2.04085 20.5246 1.98891 20.2636 1.98891 20C1.98891 19.7365 2.04085 19.4755 2.14175 19.232C2.24266 18.9885 2.39056 18.7674 2.577 18.5811L5.895 15.263C6.51699 14.6398 7.0491 13.933 7.476 13.163L9.73599 9.09598C10.1626 8.32579 10.6948 7.61898 11.317 6.99601L15.704 2.60905C16.0196 2.28583 16.4337 2.07659 16.8812 2.01432C17.3287 1.95205 17.7841 2.04029 18.176 2.26505C19.6317 3.13391 20.8474 4.35233 21.713 5.80997C21.9429 6.20198 22.0353 6.65952 21.9757 7.11002C21.9161 7.56052 21.7079 7.97828 21.384 8.29703ZM14.644 12.1971L17.486 9.35502C17.579 9.26214 17.6527 9.15183 17.7031 9.03043C17.7534 8.90903 17.7793 8.77891 17.7793 8.6475C17.7793 8.51608 17.7534 8.38596 17.7031 8.26456C17.6527 8.14317 17.579 8.03285 17.486 7.93998L16.063 6.517C15.8755 6.32953 15.6212 6.22428 15.356 6.22428C15.0908 6.22428 14.8365 6.32953 14.649 6.517L11.807 9.35905C11.6195 9.54657 11.5142 9.80091 11.5142 10.0661C11.5142 10.3312 11.6195 10.5855 11.807 10.773L13.23 12.1971C13.4171 12.3849 13.6712 12.4908 13.9364 12.4914C14.2016 12.4919 14.4561 12.3871 14.644 12.2V12.1971Z"
                                        fill="black" />
                                    <path
                                        d="M7.55299 19.2911L5.425 21.419C5.04866 21.7952 4.53828 22.0066 4.00615 22.0065C3.47401 22.0064 2.9637 21.7949 2.58749 21.4185C2.21128 21.0422 2 20.5318 2.00009 19.9997C2.00019 19.4676 2.21166 18.9573 2.588 18.5811L4.716 16.4531L7.55299 19.2911ZM21.724 5.81804C20.8584 4.36041 19.6427 3.14186 18.187 2.273C17.7951 2.04824 17.3396 1.96012 16.8922 2.02239C16.4447 2.08466 16.0306 2.29378 15.715 2.61699L15.356 2.976L21.031 8.65105L21.384 8.29705C21.7071 7.98038 21.9158 7.56529 21.9773 7.11712C22.0388 6.66894 21.9497 6.21313 21.724 5.8211V5.81804Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Today's Checkup</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Patient Management</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('walkin.index') ? 'active' : '' }}"
                        href="{{ route('walkin.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {{-- svg for walkin --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none"
                                    viewBox="0 0 48 48" id="walking">
                                    <path fill="#333"
                                        d="M31.2502 8C31.2502 10.2091 29.4594 12 27.2502 12 25.0411 12 23.2502 10.2091 23.2502 8 23.2502 5.79086 25.0411 4 27.2502 4 29.4594 4 31.2502 5.79086 31.2502 8zM25.6928 28.3968L30.8857 33.5207C31.0848 33.7172 31.2405 33.9533 31.3427 34.2137L34.112 41.2693C34.5155 42.2975 34.0091 43.4582 32.9809 43.8617 31.9527 44.2653 30.7921 43.7589 30.3885 42.7307L27.7743 36.07 18.8455 27.2598C18.4087 26.8288 18.1939 26.2211 18.2629 25.6113L18.9781 19.2919C17.2542 21.0046 15.9244 23.4143 14.9053 26.607 14.5695 27.6592 13.4442 28.24 12.3919 27.9041 11.3396 27.5682 10.7589 26.4429 11.0948 25.3907 12.965 19.5312 16.0701 15.1454 21.2797 13.1341L21.3034 13.1251C22.6301 12.6321 24.0105 12.6718 25.2398 13.3074 26.4214 13.9182 27.2624 14.9731 27.8131 16.1554 28.0449 16.6532 28.2594 17.1184 28.4607 17.5551 28.9485 18.6129 29.3594 19.5041 29.7535 20.2873 30.3073 21.3877 30.7523 22.1161 31.1921 22.6285 31.5998 23.1034 32.0055 23.3952 32.5225 23.597 33.0782 23.8141 33.8572 23.9636 35.06 23.9997 36.1641 24.0328 37.0323 24.9547 36.9992 26.0588 36.966 27.1628 36.0442 28.031 34.9401 27.9979 33.4952 27.9546 32.2121 27.77 31.0673 27.323 29.8838 26.8608 28.9506 26.1584 28.157 25.2339 27.6565 24.6508 27.2176 23.9859 26.8062 23.2621L25.6928 28.3968z">
                                    </path>
                                    <path fill="#333"
                                        d="M18.2627 30.2198L21.5778 33.3994L20.0524 38.547C19.9343 38.9453 19.6952 39.297 19.3681 39.5531L14.2335 43.5755C13.364 44.2566 12.1069 44.1039 11.4257 43.2344C10.7445 42.3649 10.8972 41.1078 11.7668 40.4266L16.3987 36.7981L17.7944 32.0881L18.2627 30.2198Z">
                                    </path>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Walk-In List</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('patient.*') ? 'active' : '' }}"
                        href="{{ route('patient.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                        fill="black" />
                                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"
                                        fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Patient</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-0">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Schedule Management</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('appointment.appointment_hours') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                        fill="black" />
                                    <path
                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                        fill="black" />
                                    <path
                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Schedule</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-0">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Medicine Inventory</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('med-list.*') ? 'active' : '' }}"
                        href="{{ route('med-list.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="30px" height="30px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill="none" d="M0 0H24V24H0z" />
                                        <path
                                            d="M19 2v2h-2v3c1.657 0 3 1.343 3 3v11c0 .552-.448 1-1 1H5c-.552 0-1-.448-1-1V10c0-1.657 1.343-3 3-3V4H5V2h14zm-2 7H7c-.552 0-1 .448-1 1v10h12V10c0-.552-.448-1-1-1zm-4 2v2h2v2h-2.001L13 17h-2l-.001-2H9v-2h2v-2h2zm2-7H9v3h6V4z" />
                                    </g>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Medicine</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
