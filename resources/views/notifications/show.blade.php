<x-app-layout>

    @section('title', 'Notifications')
    <x-slot name="header">
        <h1>
            <img src="/images/logo.png" alt="Yap">
        </h1>

    </x-slot>
    <div class="border border-gray-300 rounded-lg">
            @forelse($notifications as $notification)
                 <div class="flex p-4 border-b {{$loop->last ? '' : 'border-b-gray-400'}}">
                    @if($notification->type == 'App\Notifications\UserFollowed' && $notification->notifiable_id == currentUser()->id)
                         <p><span class="font-bold"><a href="{{route('profile.show', $notification->data['username'])}}">{{$notification->data['username']}}</a></span>  started following you.</p>
                    @elseif($notification->type == 'App\Notifications\PostReacted' && $notification->notifiable_id == currentUser()->id)
                         <p><span class="font-bold">{{$notification->data['name']}}</span> {{$notification->data['reaction']}} your post <a href="{{route('posts.show',$notification->data['id'])}}}"><span class="font-bold text-gray-500">{{$notification->data['post']}}</span></a></p>
                    @endif
                 </div>
            @empty
                There are no notifications right now.
            @endforelse

    </div>
</x-app-layout>
