<x-app-layout>
    <x-slot name="header">
        <h1>
            <img src="/images/logo.png" alt="Yap">
        </h1>

    </x-slot>

    <div class="container max-auto">
        <div class="max-w-7xl mx-32 sm:px-6 lg:px-8">
                  <div class="lg:flex lg:justify-between">
                      <div class="lg:w-32">
                          @include('_sidebar-links')
                      </div>
                      <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                          @include('_publish-post-panel')
                          <div class="border border-gray-300 rounded-lg">
                                @foreach($posts as $post)
                                  @include('_post')
                                @endforeach

                          </div>
                      </div>
                      <div class="lg:w-1/5 bg-purple-950 rounded-lg p-4">
                          @include('_friends-list')
                      </div>
                  </div>
        </div>
    </div>
</x-app-layout>
