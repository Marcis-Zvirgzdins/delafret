<x-layout>
    <x-slot name="title">
        Delafret: Mans profils
    </x-slot>
    
    <div class="mw14 center p142 profile-container-container">
        <div class="profile-container ds">
            @if (auth()->user()->profile_picture)
                <img class="ds" src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
            @else
                <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
            @endif
            <div class="profile-subcontainer">
                <p class="wtl font1 ds2">{{ auth()->user()->username }}</p>
                <a href="{{ route('profile.settings') }}" class="font1 button ds">Profila iestatījumi</a>
            <div>
        </div>
    </div>
</x-layout>