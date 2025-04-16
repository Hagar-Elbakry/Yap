<div class="border border-gray-300 rounded-lg">
    @forelse($posts as $post)
        @include('_post')
    @empty
        No Posts Yet!
    @endforelse

</div>
