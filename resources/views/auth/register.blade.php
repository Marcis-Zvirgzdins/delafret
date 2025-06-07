<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="username">Lietotājvārds</label>
        <input id="username" type="text" name="username" value="{{ old('username') }}">
        @error('username')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">E-pasts</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password">Parole</label>
        <input id="password" type="password" name="password">
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Apstipriniet paroli</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
    </div>

    <form method="POST" action="{{ route('register') }}" onsubmit="this.querySelector('button').disabled = true;">
        @csrf
        <button type="submit">Reģistrēties</button>
    </form>
</form>