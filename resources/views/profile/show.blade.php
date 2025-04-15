<x-app-layout>
    <x-slot name="header">
        <h1>
            <img src="/images/logo.png" alt="Yap">
        </h1>

    </x-slot>
        <header class="mb-6 relative">
            <img src="/images/mekho-bannar.jpg" alt="" class="mb-2 w-[700px] h-[223px] rounded-md">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                    <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
                </div>
                <div>
                    <a href="" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                    <a href="" class="bg-purple-950 rounded-full shadow py-2 px-4 text-white text-xs">Follow Me</a>
                </div>
            </div>
            <p class="text-sm">
                I'm Mokhtar, aka Mekho. My daily routine? Eat, sleep, repeat.
            </p>
            <div class="w-32 h-32 mx-auto -mt-16 z-10 relative">
            <img src="/images/mekho-bannar.jpg" alt="" class=" w-full h-full object-cover rounded-full mr-2 absolute" style="width: 150px; left: calc(50% - 75px); top: -100px">
            </div>
        </header>
    @include('_timeline', [
    'posts' => $user->posts
    ])
</x-app-layout>
