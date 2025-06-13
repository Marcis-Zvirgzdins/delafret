<x-layout>
    <x-slot name="title">
        Delafret: Mans profils
    </x-slot>
    
    <div class="mw14 center p142 profile-container-container">
        <!-- Profile Container -->
        <div class="profile-container ds">
            @if (auth()->user()->profile_picture)
                <img class="ds" src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
            @else
                <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
            @endif
            <div class="profile-subcontainer">
                <p class="wtl font1 ds2">{{ auth()->user()->username }}</p>
                <a href="{{ route('profile.settings') }}" class="font1 button ds">Profila iestatījumi</a>
            </div>
        </div>
    </div>

    <div class="mw center bookmarks-container ds">
        <h2 class="font1 ds2 mb-3">Grāmatzīmes</h2>
        
        @if($bookmarks->count() > 0)
            <div class="bookmarks-list">
                @foreach($bookmarks as $bookmark)
                    <a href="{{ route('articles.show', $bookmark->article->id) }}" class="bookmark-item ds">
                        @if($bookmark->article->thumbnail)
                            <img src="{{ asset('storage/' . $bookmark->article->thumbnail) }}" 
                                 alt="{{ $bookmark->article->title }}" 
                                 class="bookmark-image">
                        @endif
                        <div class="bookmark-details">
                            <h3 class="font1">{{ $bookmark->article->title }}</h3>
                            <p class="text-muted">Pievienots: {{ $bookmark->created_at->format('d.m.Y') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="ds">Jums vēl nav pievienotu grāmatzīmju.</p>
        @endif
    </div>
</x-layout>