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
            </div>
        </div>
    </div>

    <div class="mw center bookmarks-container ds">
        <p class="font1 ds2 wt ct title ds2">Grāmatzīmes</p>
        
        @if($bookmarks->count() > 0)
            <div class="bookmarks-list">
                @foreach($bookmarks as $bookmark)
                    <div class="bookmarked-article ds">
                        <a href="{{ route('articles.show', $bookmark->article->id) }}" class="bookmark-thumbnail ds">
                            <img src="{{ asset('storage/' . $bookmark->article->thumbnail) }}" alt="{{ $bookmark->article->title }}" class="bookmark-image">
                        </a>
                        <div class="bookmark-details">
                            <a class="category {{ strtolower($bookmark->article->category) }}-text font1 wt ds" 
                               href="{{ route('articles.category', ['category' => strtolower($bookmark->article->category)]) }}">
                                {{ ucfirst($bookmark->article->category) }}
                            </a>
                        
                            <a href="{{ route('articles.show', $bookmark->article->id) }}" class="bookmark-title font1 wt">{{ $bookmark->article->title }}</a>
                            <div class="extra-info-box transparent-color">
                                <p class="gt font1">Pievienots: {{ $bookmark->created_at->format('d.m.Y') }}</p>
                                <p class="date gt font1">{{ $bookmark->article->created_at->format('M d, Y') }} • {{ $bookmark->article->author }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty ds">
                <p class="font1 gt ct">Jums nav pievienotu grāmatzīmju.</p>
            </div>
        @endif
    </div>
</x-layout>