<div class="navbar mw14 center">
    <a href="{{ route('index') }}" class="logo">
        <img src="assets/logo-title-w-1200-400.png" alt="Delafret">
    </a>

    <div class="profile">
        @guest
            <a href="{{ route('login') }}" class="button">Pierakstīties</a>
            <a href="{{ route('register') }}" class="button">Reģistrēties</a>
        @else
            <a href="{{ route('profile') }}">
                <div class="user">
                    {{ auth()->user()->username }}
                    @if (auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile">
                    @else
                        <img src="assets/user-icon-blank-512.png" alt="Profile Picture">
                    @endif
                </div>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" onsubmit="this.querySelector('button').disabled = true;">
                @csrf
                <button type="submit" class="button">Izrakstīties</button>
            </form>
        @endif
    </div>

    <div class=misc>
        <button type="button" class="button"><img src="icons/search-b-32.svg" alt="Search"></button> 
    </div>
</div>
<div class="category mw14 center">
    <a href="/" class="games">Videospēles</a>
    <a href="/" class="tech">Tehnoloģija</a>
    <a href="/" class="movies">Filmas & TV</a>
    <a href="/" class="entertainment">Izklaides</a>
</div>