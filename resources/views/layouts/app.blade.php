<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">


            <!-- Page Heading -->
            @isset($header)
                <section class="px-8 py-4 mb-6">
                    <header class="container mx-auto">
                            {{ $header }}
                    </header>
                </section>


            @endisset

            <!-- Page Content -->
            <main>
                <div class="container max-auto">
                <div class="max-w-7xl mx-32 sm:px-6 lg:px-8">
                    <div class="lg:flex lg:justify-between">
                        <div class="lg:w-32">
                            @include('_sidebar-links')
                        </div>
                        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                                {{$slot}}
                        </div>
                        <div class="lg:w-1/5 w-fit h-fit bg-purple-950 rounded-lg p-4">
                            @include('_friends-list')
                        </div>
                    </div>
                </div>
                </div>
            </main>
        </div>
    <script src="http://unpkg.com/turbolinks"></script>
    </body>
</html>
