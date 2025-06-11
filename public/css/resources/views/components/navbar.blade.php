<div class="navbar mw14 center">
    <a href="{{ route('index') }}" class="logo">
        <img src="assets/logo-title-w-1200-400.png" alt="Delafret">
    </a>

    <div class="profile">
        @guest
            <a href="{{ route('login') }}" class="button">Pierakstīties</a>
            <a href="{{ route('register') }}" class="button">Reģistrēties</a>
        @else
            <div class="user">
                {{ auth()->user()->username }}
                <img src="assets/user-icon-blank-512.png" alt="Profile">
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button">Izrakstīties</button>
            </form>
        @endif
    </div>

    <div class=misc>
        <button type="button">Meklēt</button> 
    </div>
</div>
<div class="category mw14 center">
    <a href="/">Videospēles</a>
    <a href="/">Tehnoloģija</a>
    <a href="/">Filmas & TV</a>
    <a href="/">Izklaides</a>
</div>