<x-app-layout>
    @section('title', 'Explore')
    <x-slot name="header">
        <h1>
            <img src="/images/logo.png" alt="Yap">
        </h1>

    </x-slot>
    <div>
        @foreach($users as $user)
            <a  href="{{$user->path()}}" class="flex items-center mb-6">
                <img src="{{$user->avatar}}" alt="{{$user->username}}'s avatar" style="width: 80px; height: 80px" class="mr-4  rounded-full">
                <div>
                    <h4 class="font-bold">{{'@' . $user->username}}</h4>
                </div>
            </a>
        @endforeach
        {{$users->links()}}
    </div>
</x-app-layout>
