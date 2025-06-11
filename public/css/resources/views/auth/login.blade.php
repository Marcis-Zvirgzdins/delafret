<form method="POST" action="{{ route('login') }}">
    @csrf
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
    <button type="submit">Pieslēgties</button>
</form>