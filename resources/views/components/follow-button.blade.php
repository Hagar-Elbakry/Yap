@if(currentUser()->isNot($user))
    <div class="flex item-center space-x-2">
        <a wire:navigate href="{{route('chat', $user->id)}}" class=" p-2 relative">
            <i class="fa-solid fa-envelope text-gray-500 hover:text-gray-700"></i>
            <span class="{{$unReadMessages > 0 ? 'absolute top-[3px] right-0 -mt-[3px]  h-4 w-4 flex items-center justify-center text-[0.6rem] font-bold text-white bg-red-600 rounded-full ring-2 ring-white' : ' '}}">
                {{$unReadMessages > 0 ? $unReadMessages : ''}}
            </span>
        </a>
    </div>
<form action="/profile/{{$user->username}}/follow" method="post">
    @csrf
    <button type="submit" class="bg-purple-950 rounded-full shadow py-2 px-4 text-white text-xs">
        {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
    </button>
</form>
@endif
