@php
    $currentLang = auth()->check() ? auth()->user()->language : app()->getLocale();
@endphp


<div class="footer-container ds">
    <div class="aditional-info-container">
        <div class="lang ds {{ $currentLang === 'lv' ? 'lang-selected' : '' }}">
            <a href="{{ route('language.switch', 'lv') }}" class="flag">
                <img src="{{ asset('assets/lv.svg') }}" alt="LV">
            </a>
            <a href="{{ route('language.switch', 'lv') }}" class="c-label font1 gt">
                Latviešu
            </a>
        </div>
        <div class="lang ds {{ $currentLang === 'en' ? 'lang-selected' : '' }}">
            <a href="{{ route('language.switch', 'en') }}" class="flag">
                <img src="{{ asset('assets/us.svg') }}" alt="US">
            </a>
            <a href="{{ route('language.switch', 'en') }}" class="c-label font1 gt">
                English
            </a>
        </div>
    </div>
    <div class="copyright-notice">
        <a href="{{ route('index') }}"><img class="ds center" src="{{ asset('assets/logo-400.png') }}" alt="Delafret"></a>
        <p class="font1 gt">© Copyright 2025 Delafret Ltd.</p>
    </div>
    <div class="spacer-div-footer"></div>
</div>