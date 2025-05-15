<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Posts | {{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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
                        @include('admin._sidebar-links')
                    </div>
                    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                        <table class="table-auto w-full text-center border-separate border-spacing-y-4">
                            <thead class="text-white bg-purple-950">
                            <tr>
                                <th class="p-2">ID</th>
                                <th class="p-2">User</th>
                                <th class="p-2">Post</th>
                                <th class="p-2">Created at</th>
                                <th class="p-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr class="bg-white shadow">
                                    <td class="p-2">{{$post->id}}</td>
                                    <td class="p-2">{{$post->user->name}}</td>
                                    <td class="p-2">{{$post->body}}</td>
                                    <td class="p-2">{{$post->created_at->diffForHumans()}}</td>
                                    <td class="p-2">
                                        <a href="{{route('posts.show', $post->id)}}" class="text-gray-500 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>

</html>
