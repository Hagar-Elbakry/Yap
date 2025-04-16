<div class="flex p-4 border-b {{$loop->last ? '' : 'border-b-gray-400'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{$post->user->path()}}">
        <img src="{{$post->user->avatar()}}" alt="" class="rounded-full mr-2">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">{{$post->user->name}}</h5>

        <p class="text-sm">{{$post->body}}</p>
    </div>
</div>
