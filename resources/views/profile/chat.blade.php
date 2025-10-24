<x-app-layout>

    @section('title', $user->name . ' Chat')
    <x-slot name="header">
        <h1>
            <img src="/images/logo.png" alt="Yap">
        </h1>

    </x-slot>
    @livewire('Chat', ['user' => $user])
</x-app-layout>
