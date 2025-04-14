<h3 class="font-bold text-xl mb-4 text-white">Following</h3>
    <ul>
        @foreach(auth()->user()->follows as $user)
        <li class="mb-4">
            <div class="flex items-center text-sm text-white">
                <img src="{{$user->avatar()}}" alt="" class="rounded-full mr-4">
                {{$user->name}}
            </div>
        </li>
        @endforeach
    </ul>
