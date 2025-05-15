<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | {{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="http://unpkg.com/turbolinks"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">


    <!-- Page Heading -->
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto">
            <h1>
                <img src="/images/logo.png" alt="Yap">
            </h1>
        </header>
    </section>

    <!-- Page Content -->
    <main>
        <div class="container max-auto">
            <div class="max-w-7xl mx-32 sm:px-6 lg:px-8">
                <div class="lg:flex lg:justify-between">
                    <div class="lg:w-32">
                        @include('admin.shared._sidebar-links')
                    </div>
                    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                        <div class="w-full px-6 py-6 mx-auto">
                            <div class="flex flex-wrap -mx-3">
                                @include('admin.shared._widget', [
                                    'title' => 'Total Users',
                                    'data' => $totalUsers
                                ])

                                @include('admin.shared._widget', [
                                    'title' => 'Total Posts',
                                    'data' => $totalPosts
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</div>
</body>

</html>
