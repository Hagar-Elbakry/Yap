<h3 class="font-bold text-xl mb-4 text-white">Friends</h3>
    <ul>
        @foreach(range(1,10) as $index)
        <li class="mb-4">
            <div class="flex items-center text-sm text-white">
                <img src="https://i.pravatar.cc/40" alt="" class="rounded-full mr-4">
                Seif Ahmed
            </div>
        </li>
        @endforeach
    </ul>
