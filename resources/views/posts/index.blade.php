<x-app-layout>
    <x-slot name="header">
        <h1>
            <img src="/images/logo.png" alt="Yap">
        </h1>

    </x-slot>

        @include('_publish-post-panel')
        @include('_timeline')
</x-app-layout>
