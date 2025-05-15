<ul>

        <li>
            <a class="{{ (Route::is('admin.dashboard')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('admin.dashboard')}}">Dashboard</a>
        </li>
        <li>
            <a class="{{ (Route::is('admin.users.index')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('admin.users.index')}}">Users</a>
        </li>
        <li>
            <a class="{{ (Route::is('admin.posts.index')) ? 'text-white bg-purple-950 ' : ''}}font-bold text-lg mb-4 block" href="{{route('admin.posts.index')}}">Posts</a>
        </li>
    </ul>
