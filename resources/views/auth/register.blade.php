<x-layoutnonav>
    <x-slot name="title">
        Delafret: Reģistrēties
    </x-slot>

    <div class="login-container">
        <div class="form-container">
            <p class="w-title font1 ct">Izveidojiet jūsu kontu</p>
            <form class="registration-form center" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <input class="wt font1 first-input" placeholder="Lietotājvārds" id="username" type="text" name="username" value="{{ old('username') }}">
                    @error('username')
                        <span class="error rt font1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input class="wt font1" placeholder="E-Pasts" id="email" type="text" name="email" value="{{ old('email', request('email')) }}">
                    @error('email')
                        <span class="error rt font1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="password-container">  
                        <input class="wt font1" placeholder="Parole" id="password" type="password" name="password">
                        <button class="button-pass wt font1" type="button">
                            <img src="{{ asset('icons/visible-w-32.svg') }}" alt="Reveal">
                        </button>
                    </div>
                    @error('password')
                        <span class="error rt font1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="password-container">
                    <input class="wt font1" placeholder="Apstiprināt paroli" id="password_confirmation" type="password" name="password_confirmation">
                    <button class="wt font1" type="button">
                        <img src="{{ asset('icons/visible-w-32.svg') }}" alt="Reveal">
                    </button>
                </div>

                <form method="POST" action="{{ route('register') }}" onsubmit="this.querySelector('button').disabled = true;">
                    @csrf
                    <button class="button wt font1" type="submit">Reģistrēties</button>
                </form>
            </form>
            <p class="gt font1 ct exists">Eksistē konts? <a class="gt" href="{{ route('login') }}">Pierakstieties</a></p>
        </div>
        
        <div class="benefits-container">
            <div class="benefits-spacer"></div>
            <a href="{{ route('index') }}" class="logo">
                <img class="ds" src="{{ asset('assets/logo-title-w-1200-400.png') }}" alt="Delafret">
            </a>
            <p class="wtl font1 ct top-p">Labāka lasīšanas pieredze</p>
            <img class="ds arrow" src="{{ asset('icons/arrow-down-y-32.svg') }}" alt="Arrow Down">
            <p class="wtl font1 ct">Saglabājiet jūsu mīļākos rakstus</p>

            <div class="footer-container">
                <div class="aditional-info-container" id="nml">
                    <div class="lang ds">
                        <a class="flag" href="{{ route('index') }}"><img class="ds center" src="{{ asset('assets/lv.svg') }}" alt="LV"></a>
                        <a class="c-label font1 gt" href="{{ route('index') }}">Latviešu</a>
                    </div>
                    <div class="lang ds">
                        <a class="flag" href="{{ route('index') }}"><img class="ds center" src="{{ asset('assets/us.svg') }}" alt="US"></a>
                        <a class="c-label font1 gt" href="{{ route('index') }}">English</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</x-layoutnonav>