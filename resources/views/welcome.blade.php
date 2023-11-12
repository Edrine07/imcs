<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Immaculate Medico-Surgical Clinic</title>

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('images/imcs.svg') }}" type="image/x-icon">

    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }

        #dropdown-toggle:checked+#dropdown {
            display: block;
        }

        a,
        span {
            position: relative;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.arrow,
        span.arrow {
            display: flex;
            align-items: center;
            font-weight: 600;
            line-height: 1.5;
        }

        a.arrow .arrow_icon,
        span.arrow .arrow_icon {
            position: relative;
            margin-left: 0.5em;
        }

        a.arrow .arrow_icon svg,
        span.arrow .arrow_icon svg {
            transition: transform 0.3s 0.02s ease;
            margin-right: 1em;
        }

        a.arrow .arrow_icon::before,
        span.arrow .arrow_icon::before {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 0;
            width: 0;
            height: 2px;
            background: rgb(145, 133, 165);
            transform: translateY(-50%);
            transition: width 0.3s ease;
        }

        a.arrow:hover .arrow_icon::before,
        span.arrow:hover .arrow_icon::before {
            width: 1em;
        }

        a.arrow:hover .arrow_icon svg,
        span.arrow:hover .arrow_icon svg {
            transform: translateX(0.75em);
        }

        .bg-blue-teal-gradient {
            background-image: url('https://images.unsplash.com/photo-1618498082410-b4aa22193b38?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
        }

        .gallery-image {
            width: 300px;
            height: 350px;
            /* keep aspect ratio */
            object-fit: cover;
        }

        .link-no-border-hover:hover {
            background-color: #66aae2;
            color: white;
            border: none;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        /* Center the images on small screens */
        @media (max-width: 640px) {
            .gallery-image {
                margin: 0 auto;
            }
        }
    </style>
</head>

<body class="font-Poppins">
    <!-- start header -->
    <header class="absolute top-0 left-0 w-full z-50 px-4 lg:px-10 xl:px-30 2xl:px-44">
        <div class="md:flex justify-between items-center text-sm py-3" style="border-color: rgba(207, 25, 25, 0.25)">
            <div class="md:w-1/2">
                <ul class="flex text-black">
                    <li class="md:mr-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-blue-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                            </svg>
                            <span class="ml-2">Padre Diaz St. Zone 6, Bulan, Sorsogon</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-blue-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z" />
                            </svg>
                            <span class="ml-2">09192771777</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        <div class="flex flex-wrap items-center justify-between pt-1 pb-6">
            <div class="w-full md:w-auto">
                <a href="/"
                    class="italic font-light font-serif md:text-violet-400 text-3xl text-poppins cursor-pointer">
                    Immaculate Medico-Surgical Clinic
                </a>
            </div>
            <!-- Mobile Menu Toggle -->
            <label for="menu-toggle" class="pointer-cursor md:hidden block">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>

            <!-- Hidden Checkbox Input for Menu Toggle -->
            <input type="checkbox" id="menu-toggle" class="hidden">

            <div class="hidden md:flex w-full md:w-auto" id="menu">
                <nav
                    class="w-full bg-blue-100 md:bg-transparent rounded shadow-lg px-4 py-4 mt-5 text-center md:p-0 md:mt-0 md:shadow-none">
                    <ul class="md:flex items-center font-poppins">
                        <li class="md:ml-4"><a
                                class="py-2 inline-block md:text-black-100 md:px-2 font-semibold nav__link link-no-border-hover"
                                href="#home">Home</a></li>
                        <li class="md:ml-4"><a
                                class="py-2 inline-block md:text-black-100 md:px-2 font-semibold nav__link link-no-border-hover"
                                href="#about">About</a></li>
                        <li class="md:ml-4"><a
                                class="py-2 inline-block md:text-black-100 md:px-2 font-semibold nav__link link-no-border-hover"
                                href="#service">Services</a></li>
                        <li class="md:ml-4"><a
                                class="py-2 inline-block md:text-black-100 md:px-2 font-semibold nav__link link-no-border-hover"
                                href="#blog">Blogs</a></li>

                        <li class="md:ml-6 mt-3 md:mt-0">
                            <a class="inline-block font-semibold px-5 py-3 text-white bg-blue-600 md:text-white-800 border border-blue-100 rounded hover:bg-blue-500 md:hover:bg-blue-100 hover:text-white md:hover:text-blue-800 transition duration-300 ease-in-out"
                                href="{{ route('appointment') }}">Book Appointment</a>
                        </li>
                        <li class="md:ml-4"><a
                                class="py-2 inline-block md:text-black-100 md:px-2 font-semibold nav__link link-no-border-hover"
                                href="{{ route('admin.login') }}">Login</a></li>
                    </ul>
                </nav>
            </div>

            <!-- JavaScript to Toggle the Mobile Menu -->
            <script>
                document.getElementById('menu-toggle').addEventListener('change', function() {
                    var menu = document.getElementById('menu');
                    menu.classList.toggle('hidden');
                });
            </script>
        </div>

    </header>
    <!-- end header -->

    <!-- start hero -->
    <section class="home section" id="home">
        <div class="bg-gray-100">
            <section
                class="bg-cover bg-blue-teal-gradient relative px-4 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-16 lg:py-48 flex items-center min-h-screen">

                <div class="h-full absolute top-0 left-0 z-0">
                </div>
                <div class="lg:w-3/4 xl:w-2/4 relative z-8 h-50 lg:mt-9">
                    <div>
                        <h1 class=" font-medium justify-end text-4xl md:text-2xs xl:text-6xl  leading-tight">We Care For
                        </h1>
                        <h1 class="font-medium text-4xl md:text-2xs xl:text-6xl leading-tight text-black">Your Health
                        </h1>
                        <p class="italic text-black-100 text-xl md:text-2xl leading-snug mt-4">As your trusted
                            healthcare
                            partner, we believe that your well-being is our top priority.</p>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- end hero -->

    <!-- start about -->
    <section class="about section" id="about">
        <section class="bg-blue-100 px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="flex flex-col lg:flex-row lg:-mx-8">
                <div class="w-full lg:w-1/2 lg:px-8">
                    <h2 class="text-3xl leading-tight font-bold mt-4">Welcome to the IMSClinic of<br>Dr. Leonardo Carpio
                    </h2>
                    <p class="text-lg mt-4 font-semibold">Excellence in General Surgeon/Physician</p>
                    <p class="mt-2 leading-relaxed text-justify">The Medical Clinic of Dr. Carpio, a distinguished
                        physician
                        and surgeon, had its humble beginnings in the year 2000.
                        Dr. Carpio, driven by a deep commitment to providing exceptional healthcare to his community,
                        established this clinic
                        with a vision of promoting well-being and offering comprehensive medical services under one
                        roof.
                    </p>
                </div>
                <div class="lg:w-1/2 lg:px-8">
                    <div class="flex flex-col lg:flex-row lg:-mx-8">
                        <div class="w-full lg:w-96 lg:px-15">
                            <img src="../assets/img/gallery1.jpg" alt="Image Alt Text" class="w-full lg:w-300 " />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- end about -->

    <!-- start testimonials -->
    <section class="bg-blue-100 px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
        <div class="flex flex-col lg:flex-row lg:-mx-8">
            <div class="w-full lg:w-1/2 lg:px-8">
                <!-- Content for the left column goes here -->
                <h2 class="italic text-3xl leading-tight font-bold mt-4">Why choose the Immaculate Medico-Surgical
                    Clinic?</h2>
                <h3 class="italic text-2xl leading-tight font-bold">A Comprehensive
                    Healthcare Destination</h3>
                <p class="text-justify mt-2 leading-relaxed">Selecting the right medical clinic is a crucial decision
                    that directly impacts our health and well-being. Among the
                    myriad options available, the Immaculate Medico-Surgical Clinic stands out as a compelling choice
                    for various reasons.
                    This essay explores the factors that make this clinic an attractive option for individuals seeking
                    quality healthcare. One of the primary considerations when choosing a medical clinic is the
                    specialization it offers. The Immaculate
                    Medico-Surgical Clinic is known for its expertise in specific medical fields, particularly surgery.
                    Patients with
                    surgical needs or those seeking consultations with experienced surgeons are drawn to this clinic for
                    its specialized
                    care. Whether it's a complex surgical procedure or a routine intervention, the clinic's surgeons are
                    known for their
                    proficiency and dedication.</p>
            </div>
            <div class="w-full lg:w-1/2 lg:px-8 mt-12 lg:mt-0">
                <div class="md:flex">
                    <div>
                        <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
                    </div>
                    <div class="md:ml-8 mt-4 md:mt-0">
                        <h4 class="text-xl font-bold leading-tight text-justify">Our Mission</h4>
                        <p class="mt-2 leading-relaxed text-justify">At IMSClinic, our mission is clear: to promote and
                            maintain the
                            health and well-being of our patients. We believe
                            that good health is the foundation of a fulfilling life, and we are here to support you
                            every step of the way.
                            Whether
                            you require routine check-ups, specialized medical treatment, or expert surgical care, we
                            have the expertise and
                            resources to meet your healthcare needs.</p>
                    </div>
                </div>

                <div class="md:flex mt-8">
                    <div>
                        <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
                    </div>
                    <div class="md:ml-8 mt-4 md:mt-0">
                        <h4 class="text-xl font-bold leading-tight">Our Vission</h4>
                        <p class="mt-2 leading-relaxed text-justify">"To be the beacon of healthcare excellence, where
                            innovation and
                            compassion converge to empower individuals and
                            communities towards a healthier and brighter future."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonials -->
    <section class="service section" id="service">
        <section class="bg-blue-100 px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="flex flex-col lg:flex-row lg:-mx-8">
                <div class="lg:w-1/2 lg:px-8">
                    <h2 class="text-3xl leading-tight font-bold mt-4">A Comprehensive Look at Healthcare Services: A
                        General Surgeons and
                        Physician Doctor</h2>
                    <p class="text-justify mt-2 leading-relaxed">In the realm of healthcare, the roles of general
                        surgeons and physician doctors stand out as vital and complementary.
                        These medical professionals provide a wide array of services, each contributing to the overall
                        well-being of patients.
                        This essay delves into the distinct but interconnected services offered by general surgeons and
                        physician doctors,
                        highlighting their importance in the world of medicine. Immaculate Medico-Surgical Clinic is
                        your one-stop destination for healthcare excellence. With our experienced
                        doctor
                        specializing in both surgery and general medicine, we offer a wide range of services, from
                        surgical procedures to
                        general medical care. Our patient-centric approach ensures personalized treatment plans,
                        emphasizing wellness,
                        prevention, and your overall well-being. Your health is our priority, and we provide
                        compassionate care in a
                        welcoming
                        environment. Choose Immaculate Medico-Surgical Clinic for comprehensive and expert healthcare
                        services.</p>
                </div>
                <div class="lg:w-1/2 lg:px-8">
                    <div class="flex flex-col lg:flex-row lg:-mx-8">
                        <div class="w-full lg:w-96 lg:px-15">
                            <img src="../assets/img/gallery10.jpeg" alt="Image Alt Text"
                                class="w-full lg:max-w-full lg:w-80 " />

                        </div>
                    </div>

                </div>
        </section>
    </section>
    <section class="bg-blue-200 px-4 py-12 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
        <div class="md:flex md:flex-wrap mt-8 text-center md:-mx-4">
            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/surgical.jpg" alt="" class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Surgical Procedures</h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>

            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/services2.jpg" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Specialized Care (e.g., Cardiology, Orthopedics, Gynecology)
                    </h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>

            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/services3.jpg" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Endoscopic Expertise</h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>

            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/services4.jpg" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Wound Care and Surgical Management</h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>
        </div>
        <div class="md:flex md:flex-wrap mt-8 text-center md:-mx-4">
            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/services5.jpg" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Diagnosis and Treatment</h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>

            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/services6.jpg" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Chronic Disease Management
                    </h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>

            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="../assets/img/services7.jpg" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Health Education and Counseling</h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>

            <div class="md:w-1/2 md:px-4 lg:w-1/4">
                <div class="flex flex-col bg-white rounded-lg border border-gray-300 p-8 h-full">
                    <img src="{{ asset('assets/img/services8.png') }}" alt=""
                        class="h-32 w-32 mx-auto mb-4 rounded-full">
                    <h4 class="text-xl font-bold flex-1">Referrals and Collaborative Care</h4>
                    <a href="#" class="block mt-4 text-blue-500 hover:underline">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- start blog -->
    <section class="blog section" id="blog">
        <section class="bg-blue-100 px-4 py-6 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="md:flex md:flex-wrap mt-8 text-center md:-mx-4">
                <h1 class="text-3xl font-semibold mb-4">Image Gallery</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Gallery Images -->
                    <div class="p-2">
                        <img src="../assets/img/gallery3.jpg" alt="Image 1"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <div class="p-2">
                        <img src="../assets/img/gallery4.jpg" alt="Image 2"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <div class="p-2">
                        <img src="../assets/img/gallery8.jpg" alt="Image 4"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <div class="p-2">
                        <img src="../assets/img/gallery9.jpg" alt="Image 5"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <div class="p-2">
                        <img src="../assets/img/gallery7.jpg" alt="Image 5"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <div class="p-2">
                        <img src="../assets/img/gallery5.jpg" alt="Image 6"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <div class="p-2">
                        <img src="../assets/img/gallery6.jpg" alt="Image 7"
                            class="gallery-image w-full h-auto rounded-lg">
                    </div>
                    <!-- Add more images as needed -->
                </div>
            </div>
        </section>
    </section>
    <!-- start cta -->
    <section
        class="relative bg-blue-teal-gradient px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12 text-center md:text-left">
        <div class="md:flex md:items-center md:justify-center">
            <h2 class="text-xl font-bold text-black lg:pr-12">Get in touch with us today! <br
                    class="block md:hidden">Call
                us on: +639192771777</h2>
            <a href="{{-- route('admin.appointment') --}}"
                class="inline-block font-semibold lg:ml-12 px-5 py-3 text-white bg-blue-600 md:text-white-800 border border-blue-100 rounded hover:bg-blue-500 md:hover:bg-blue-100 hover:text-white md:hover:text-blue-800 transition duration-300 ease-in-out">Book
                Appointment</a>
        </div>
    </section>
    <!-- end cta -->

    <!-- start footer -->
    <footer class="relative bg-gray-900 text-white px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12 lg:py-15">
        <div class="flex flex-wrap">
            <div class="w-full sm:w-1/2 lg:w-1/4 xl:w-1/4 lg:pr-8">
                <h3 class="italic font-bold text-3xl">IMSClinic</h3>
                <p class="text-gray-400">Your Health, Our Priority.</p>
                <form class="flex items-center mt-6">
                    <div class="w-full">
                        <label class="block uppercase tracking-wide text-gray-600 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Message us for your concerns
                        </label>
                        <div class="relative">
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-4 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                type="email" placeholder="Your Email Address">

                            <button type="submit"
                                class="bg-teal-500 hover:bg-teal-400 text-white px-4 py-2 text-sm font-bold rounded absolute top-0 right-0 my-2 mr-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="w-full sm:w-1/2 lg:w-1/4 xl:w-1/4 mt-8 lg:mt-0">
                <h5 class="uppercase tracking-wider font-semibold text-gray-500">Treatments</h5>
                <ul class="mt-4">
                    <li class="mt-2"><a href="#" title=""
                            class="opacity-75 hover:opacity-100">Surgical Procedures</a></li>
                    <li class="mt-2"><a href="#" title="" class="opacity-75 hover:opacity-100">Wound
                            Care</a></li>
                    <li class="mt-2"><a href="#" title="" class="opacity-75 hover:opacity-100">Primary
                            Care</a></li>
                    <li class="mt-2"><a href="#" title=""
                            class="opacity-75 hover:opacity-100">Diagnosis and Treatment</a></li>
                    <li class="mt-2"><a href="#" title=""
                            class="opacity-75 hover:opacity-100">Prescription Medications</a></li>
                </ul>
            </div>

            <div class="w-full sm:w-1/2 lg:w-1/4 xl:w-1/4 mt-8 lg:mt-0 lg:pr-8">
                <h5 class="uppercase tracking-wider font-semibold text-gray-500">Contact Details</h5>
                <ul class="mt-4">
                    <li class="mt-4">
                        <a href="#" title="" class="flex items-center opacity-75 hover:opacity-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" class="fill-current">
                                    <path
                                        d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                                </svg>
                            </span>
                            <span class="ml-3">
                                Padre Diaz St. Zone 6 Bulan, Sorsogon
                            </span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="#" title="" class="flex items-center opacity-75 hover:opacity-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" class="fill-current">
                                    <path
                                        d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z" />
                                    <path d="M13 7L11 7 11 13 17 13 17 11 13 11z" />
                                </svg>
                            </span>
                            <span class="ml-3">
                                Mon - Fri: 9:00 - 19:00<br>
                                Closed on Weekends
                            </span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="#" title="" class="flex items-center opacity-75 hover:opacity-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" class="fill-current">
                                    <path
                                        d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z" />
                                </svg>
                            </span>
                            <span class="ml-3">
                                +639192771777
                            </span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="#" title="" class="flex items-center opacity-75 hover:opacity-100">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" class="fill-current">
                                    <path
                                        d="M20,4H4C2.896,4,2,4.896,2,6v12c0,1.104,0.896,2,2,2h16c1.104,0,2-0.896,2-2V6C22,4.896,21.104,4,20,4z M20,8.7l-8,5.334 L4,8.7V6.297l8,5.333l8-5.333V8.7z" />
                                </svg>
                            </span>
                            <span class="ml-3">
                                IMSClinic@gmail.com
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-full sm:w-1/2 lg:w-1/4 xl:w-1/4 mt-8 lg:mt-0">
                <h5 class="uppercase tracking-wider font-semibold text-gray-500">We're Social</h5>
                <ul class="mt-4 flex">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=100009122045923" target="_blank"
                            title="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="fill-current">
                                <path
                                    d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592	c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20	c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z" />
                            </svg>
                        </a>
                    </li>

                    <li class="ml-6">
                        <a href="#" target="_blank" title="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="fill-current">
                                <path
                                    d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809	c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793	c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05	c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032	c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028	c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22	c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z" />
                            </svg>
                        </a>
                    </li>

                    <li class="ml-6">
                        <a href="#" target="_blank" title="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="fill-current">
                                <path
                                    d="M20.947,8.305c-0.011-0.757-0.151-1.508-0.419-2.216c-0.469-1.209-1.424-2.165-2.633-2.633 c-0.699-0.263-1.438-0.404-2.186-0.42C14.747,2.993,14.442,2.981,12,2.981s-2.755,0-3.71,0.055 c-0.747,0.016-1.486,0.157-2.185,0.42C4.896,3.924,3.94,4.88,3.472,6.089C3.209,6.788,3.067,7.527,3.053,8.274 c-0.043,0.963-0.056,1.268-0.056,3.71s0,2.754,0.056,3.71c0.015,0.748,0.156,1.486,0.419,2.187 c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45c0.963,0.043,1.268,0.056,3.71,0.056s2.755,0,3.71-0.056 c0.747-0.015,1.486-0.156,2.186-0.419c1.209-0.469,2.164-1.425,2.633-2.633c0.263-0.7,0.404-1.438,0.419-2.187 c0.043-0.962,0.056-1.267,0.056-3.71C21.003,9.572,21.003,9.262,20.947,8.305z M11.994,16.602c-2.554,0-4.623-2.069-4.623-4.623 s2.069-4.623,4.623-4.623c2.552,0,4.623,2.069,4.623,4.623S14.546,16.602,11.994,16.602z M16.801,8.263 c-0.597,0-1.078-0.482-1.078-1.078s0.481-1.078,1.078-1.078c0.595,0,1.077,0.482,1.077,1.078S17.396,8.263,16.801,8.263z" />
                                <circle cx="11.994" cy="11.979" r="3.003" />
                            </svg>
                        </a>
                    </li>

                    <li class="ml-6">
                        <a href="#" target="_blank" title="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="fill-current">
                                <path
                                    d="M21.593,7.203c-0.23-0.858-0.905-1.535-1.762-1.766C18.265,5.007,12,5,12,5S5.736,4.993,4.169,5.404	c-0.84,0.229-1.534,0.921-1.766,1.778c-0.413,1.566-0.417,4.814-0.417,4.814s-0.004,3.264,0.406,4.814	c0.23,0.857,0.905,1.534,1.763,1.765c1.582,0.43,7.83,0.437,7.83,0.437s6.265,0.007,7.831-0.403c0.856-0.23,1.534-0.906,1.767-1.763	C21.997,15.281,22,12.034,22,12.034S22.02,8.769,21.593,7.203z M9.996,15.005l0.005-6l5.207,3.005L9.996,15.005z" />
                            </svg>
                        </a>
                    </li>
                </ul>

                <p class="text-sm text-gray-400 mt-12">©IMSClinic <br class="hidden lg:block">All Rights
                    Reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    {{-- <script>
        $('.grid').isotope({
            // options
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });
    </script> --}}

</body>

</html>
