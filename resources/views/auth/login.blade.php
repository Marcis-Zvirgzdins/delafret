<x-layoutnonav>
    <x-slot name="title">
        Delafret: Pieslēgties
    </x-slot>

    <div class="login-container">
        <div class="form-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <input placeholder="E-Pasts" id="email" type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input placeholder="Parole" id="password" type="password" name="password">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <form method="POST" action="{{ route('login') }}" onsubmit="this.querySelector('button').disabled = true;">
                    @csrf
                    <button type="submit">Pieslēgties</button>
                </form>
            </form>
        </div>
        
        <div class="benefits-container">
            <a href="{{ route('index') }}" class="logo">
                <img class="ds" src="{{ asset('assets/logo-title-w-1200-400.png') }}" alt="Delafret">
            </a>
        </div>
    </div>
</x-layoutnonav>