@if(currentUser()->isNot($user))
<form action="/profile/{{$user->name}}/follow" method="post">
    @csrf
    <button type="submit" class="bg-purple-950 rounded-full shadow py-2 px-4 text-white text-xs">
        {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
    </button>
</form>
@endif
