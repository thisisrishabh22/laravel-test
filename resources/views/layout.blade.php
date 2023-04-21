<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Mood Tracker</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a class="text-2xl font-semibold text-white" href="/">Year in Pixels</a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="/moods"
                                    class="text-gray-300 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-light">Moods</a>

                                <a href="/entries"
                                    class="text-gray-300 rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-light">Entries</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <a href="/moods/create"
                            class="bg-yellow-200 hover:bg-yellow-400 mx-6 inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-light shadow-sm">
                            New mood
                        </a>
                        <a href="/entries/create"
                            class="inline-flex justify-center rounded-md border border-transparent bg-teal-200 py-2 px-4 text-sm font-medium text-light shadow-sm hover:bg-teal-400">
                            New entry
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="container mx-auto px-8 py-16">@yield('content')</div>
        </main>
    </div>
</body>

</html>
