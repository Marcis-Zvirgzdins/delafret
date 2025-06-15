@php
    $currentLang = auth()->check() ? auth()->user()->language : app()->getLocale();
@endphp

<x-layoutnonav>
    <x-slot name="title">
        Delafret: {{__('messages.log_in_button')}}
    </x-slot>

    <div class="login-container">
        <div class="form-container">
            <p class="w-title font1 ct">{{__('messages.log_in_title')}}</p>
            <form class="registration-form center" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <input class="wt font1 first-input" placeholder="{{__('messages.email')}}" id="email" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="error rt font1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="password-container">  
                        <input class="wt font1" placeholder="{{__('messages.password')}}" id="password" type="password" name="password">
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
                    <button class="button wt font1" type="submit">{{__('messages.log_in_button')}}</button>
                </form>
            <p class="gt font1 ct exists">{{__('messages.no_account')}} <a class="gt" href="{{ route('register') }}">{{__('messages.register')}}</a></p>
            </form>
        </div>
        
        <div class="benefits-container">
            <div class="benefits-spacer"></div>
            <a href="{{ route('index') }}" class="logo">
                <img class="ds" src="{{ asset('assets/logo-title-w-1200-400.png') }}" alt="Delafret">
            </a>

            <div class="footer-container">
                <div class="aditional-info-container" id="nml">
                    <div class="lang ds {{ $currentLang === 'lv' ? 'lang-selected' : '' }}">
                        <a class="flag" href="{{ route('language.switch', 'lv') }}">
                            <img class="ds center" src="{{ asset('assets/lv.svg') }}" alt="LV">
                        </a>
                        <a class="c-label font1 gt" href="{{ route('language.switch', 'lv') }}">
                            Latviešu
                        </a>
                    </div>
                    <div class="lang ds {{ $currentLang === 'en' ? 'lang-selected' : '' }}">
                        <a class="flag" href="{{ route('language.switch', 'en') }}">
                            <img class="ds center" src="{{ asset('assets/us.svg') }}" alt="US">
                        </a>
                        <a class="c-label font1 gt" href="{{ route('language.switch', 'en') }}">
                            English
                        </a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
    <script src="{{ asset('js/auth.js') }}"></script>
</x-layoutnonav>