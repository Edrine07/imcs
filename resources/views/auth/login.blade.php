<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('../assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('../assets/js/init-alpine.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('images/imsc.png') }}" type="image/x-icon">
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div
            class="flex-1 h-full max-w-4xl mx-auto overflow-hidden rounded-lg bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class=" object-cover w-full h-full dark:block" src="../assets/img/doc1.jpg"
                        alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <a href="/" class="flex items-center justify-center">
                            <x-application-logo class="w-20 h-40 fill-current text-gray-500" />
                        </a>
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>
                        <form method="POST" action="{{ route('admin.session') }}">
                            @csrf
                            <label for="email" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input id="email" type="email" name="email" required autofocus
                                    placeholder="Email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-700 dark:focus:shadow-outline-gray form-input" />
                            </label>
                            <label for="password" class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:outline-none focus:shadow-outline-purple dark:text-gray-700 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" id="password" name="password" type="password"
                                    required autocomplete="current-password" />
                            </label>
                            <div class="block form-group text-sm mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <span class="text-gray-700 dark:text-gray-400 text-sm">Remember Me</span>
                                </div>
                            </div>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                type="submit" {{-- href="{{ a }}" --}}>
                                Log in
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
