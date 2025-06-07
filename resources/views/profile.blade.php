<x-layout>
    <x-slot name="title">
        Delafret: Mans profils
    </x-slot>
    
    <h1>{{ auth()->user()->username }}</h1>
    <a href="{{ route('profile.options') }}" class="btn btn-secondary">Profila iestatījumi</a>
</x-layout>