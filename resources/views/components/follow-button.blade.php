@if(currentUser()->isNot($user))
    <div class="flex item-center space-x-2">
        <a href="" class=" p-2 ">
            <i class="fa-solid fa-envelope text-gray-500 hover:text-gray-700"></i>
        </a>
    </div>
<form action="/profile/{{$user->username}}/follow" method="post">
    @csrf
    <button type="submit" class="bg-purple-950 rounded-full shadow py-2 px-4 text-white text-xs">
        {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
    </button>
</form>
@endif
