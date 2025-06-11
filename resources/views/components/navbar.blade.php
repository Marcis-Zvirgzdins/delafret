<div class="all-navbar mw14 center ds transparent">
    <div class="navbar">
        <a href="{{ route('index') }}" class="logo">
            <img class="ds" src="{{ asset('assets/logo-title-w-1200-400.png') }}" alt="Delafret">
        </a>

        <div class="profile">
            @guest
                <a href="{{ route('login') }}" class="button font1">Pierakstīties</a>
                <a href="{{ route('register') }}" class="button font1">Reģistrēties</a>
            @else
                <a href="{{ route('profile') }}" class="redirect wt">
                    <div class="user">
                        <span class="display-name wt font1 ds">{{ auth()->user()->username }}</span>
                        @if (auth()->user()->profile_picture)
                            <img class="ds" src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile">
                        @else
                            <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                        @endif
                    </div>
                </a>


                <form method="POST" action="{{ route('logout') }}" onsubmit="this.querySelector('button').disabled = true;">
                    @csrf
                    <button type="submit" class="button font1">Izrakstīties</button>
                </form>

                @can('create', App\Models\User::class)
                    <a href="{{ route('articles.create') }}" class="button create">
                        <img src="{{ asset('icons/add-b-32.svg') }}" alt="Create Article">
                    </a>
                @endcan
            @endif
        </div>

        <div class=misc>
            <button type="button" class="button"><img src="{{ asset('icons/search-b-32.svg') }}" alt="Search"></button> 
        </div>
    </div>
    <div class="category center">
        <a href="{{ route('articles.category', 'games') }}" class="games font1 wt">Videospēles</a>
        <a href="{{ route('articles.category', 'tech') }}" class="tech font1 wt">Tehnoloģija</a>
        <a href="{{ route('articles.category', 'movies') }}" class="movies font1 wt">Filmas & TV</a>
        <a href="{{ route('articles.category', 'entertainment') }}" class="entertainment font1 wt">Izklaides</a>
    </div>
</div>