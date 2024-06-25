<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blogger</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 gap-2 py-10 items-start">
                <div class="flex lg:justify-normal col-start-1">

                    <div class="text-4xl font-extrabold">
                        <a href="/">
                        <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                            BLOGGER
                        </span>
                        </a>
                    </div>
                </div>

                <nav class="-mx-3 flex flex-1 justify-end">
                    <a href="{{ route('login') }}"
                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>

                </nav>

            </header>

            <main>
                <!-- Display alert messages -->
                @include('components.alert')
                {{ $slot }}
            </main>
            <footer class="py-16 text-center text-sm text-black dark:text-white/70"></footer>
        </div>
    </div>
</div>
</body>

</html>
