<h3 class="font-bold text-xl mb-4 text-white">Following</h3>
    <ul>
        @forelse(auth()->user()->follows as $user)
        <li class="{{$loop->last ? '' : 'mb-4'}}">
            <div >
                <a href="{{$user->path()}}" class="flex items-center text-sm text-white">
                    <img src="{{$user->avatar}}" alt="" class="rounded-full mr-4" style="width: 40px; height: 40px">
                    {{$user->name}}
                </a>

            </div>
        </li>
        @empty
            <p class="text-white">No Friends Yet!</p>
        @endforelse
    </ul>
