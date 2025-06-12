<x-layoutnonav>
    <x-slot name="title">
        Delafret: Pieslēgties
    </x-slot>

    <div class="login-container">
        <div class="form-container">
            <p class="w-title font1 ct">Pieslēdzaties</p>
            <form class="registration-form center" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <input class="wt font1 first-input" placeholder="E-Pasts" id="email" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="error rt font1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="password-container">  
                        <input class="wt font1" placeholder="Parole" id="password" type="password" name="password">
                        <button class="button-pass wt font1 @error('email') error-border-pass-btn @enderror" type="button">
                            <img src="{{ asset('icons/visible-w-32.svg') }}" alt="Reveal">
                        </button>
                    </div>
                    @error('password')
                        <span class="error rt font1">{{ $message }}</span>
                    @enderror
                </div>

                <form method="POST" action="{{ route('login') }}" onsubmit="this.querySelector('button').disabled = true;">
                    @csrf
                    <button class="button wt font1" type="submit">Pieslēgties</button>
                </form>
            <p class="gt font1 ct exists">Neeksistē konts? <a class="gt" href="{{ route('register') }}">Reģistrējieties</a></p>
            </form>
        </div>
        
        <div class="benefits-container">
            <a href="{{ route('index') }}" class="logo">
                <img class="ds" src="{{ asset('assets/logo-title-w-1200-400.png') }}" alt="Delafret">
            </a>
        </div>
    </div>
    <script src="{{ asset('js/auth.js') }}"></script>
</x-layoutnonav>