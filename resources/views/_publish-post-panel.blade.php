<div class="border border-purple-950 rounded-lg px-8 py-6 mb-8">
    <form method="post" action="/posts">
        @csrf
        <div class="flex justify-between">
            <img src="{{auth()->user()->avatar(65)}}" class="rounded-full mr-4" alt="your avatar">
            <textarea name="body" class="w-full" placeholder="write something"></textarea>
        </div>
        <footer class="flex justify-end py-4">
            <button type="submit" class="bg-purple-950 rounded-xl shadow py-2 px-2 text-white">Post</button>
        </footer>
    </form>
    @error('body')
        <div class="text-red-500 text-sm">{{$message}}</div>
    @enderror
</div>
