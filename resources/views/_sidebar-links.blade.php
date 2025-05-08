<ul>
        <li>
            <a class="{{ (Route::is('posts.index')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('posts.index')}}">Home</a>
        </li>
        <li>
            <a class="{{ (Route::is('explore')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('explore')}}">Explore</a>
        </li>

        <li>
            <a class="{{ (Route::is('notifications')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('notifications')}}">Notifications</a>
        </li>

        <li>
            <a class="{{ (Route::is('profile.show',currentUser()->username)) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('profile.show', currentUser()->username)}}">Profile</a>
        </li>

        @if(currentUser()->is_admin)
        <li>
            <a class="{{ (Route::is('admin.dashboard')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        @endif
        <li>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="font-bold text-lg">Logout</button>
            </form>
        </li>
    </ul>
