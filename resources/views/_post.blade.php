<div class="flex p-4 border-b {{$loop->last ? '' : 'border-b-gray-400'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{$post->user->path()}}">
        <img src="{{$post->user->avatar}}" alt="" class="rounded-full mr-2" style="width: 50px; height: 50px">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-2">{{$post->user->name}}</h5>

        <p class="text-sm mb-1">{{$post->body}}</p>
        <div class="flex">
            <form action="/posts/{{$post->id}}/like" method="post">
                @csrf
            <div class="flex items-center mr-2">
                <svg viewBox="0 0 20 20" class="mr-2 w-3">
                    <path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/>
                </svg>
                <button type="submit" class="text-xs  {{$post->isLikedBy(currentUser()) ? 'text-blue-500' : 'text-gray-500 '}}">{{$post->likes ?: 0}}</button>
            </div>
            </form>
            <form action="/posts/{{$post->id}}/like" method="post">
                @csrf
                @method('DELETE')

            <div class="flex items-center">
                <svg viewBox="0 0 20 20" class="mr-2 w-3">
                    <path d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z"/>
                </svg>
                <button type="submit" class="text-xs {{$post->isDislikedBy(currentUser()) ? 'text-blue-950' : 'text-gray-500 '}}">{{$post->dislikes ?: 0}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
