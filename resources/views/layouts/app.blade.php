<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Alpine.js (if not bundled in app.js, though usually Breeze includes it) -->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50" style="font-family: 'Outfit', sans-serif;">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col h-screen overflow-y-auto md:ml-60">
                <!-- Topbar (Mobile mainly) -->
                @include('layouts.topbar')

                <!-- Page Header for Desktop -->
                @isset($header)
                    <header class="bg-white sticky top-0 z-10 hidden md:block border-b border-gray-100 shadow-sm">
                        <div class="px-8 py-5">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
                
                <!-- Page Header for Mobile -->
                @isset($header)
                    <header class="bg-white md:hidden border-b border-gray-100 shadow-sm">
                        <div class="px-4 py-4">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-4 sm:p-6 lg:p-8 flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
