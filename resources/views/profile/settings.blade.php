<x-layout>
    <x-slot name="title">
        Delafret: {{ __('messages.edit_profile') }}
    </x-slot>

    <div class="mw14 center p142 p-settings-container-container">
        <div class="profile-settings-container ds">
            <div class="profile-picture ds">
                @if (auth()->user()->profile_picture)
                    <img class="ds profile-img" src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
                    <div class="profile-edit-side-container">
                        <p class="wt font1 ds2">{{ auth()->user()->username }}</p>
                        <form action="{{ route('profile.remove') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="remove-profile-btn" class="font1 button ds">{{ __('messages.delete_profile_image') }}</button>
                        </form>
                    </div>
                @else
                    <img class="ds profile-img" class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                    <div class="profile-edit-side-container">
                        @php
                            $response = file_get_contents('https://ipinfo.io/json');
                            $data = json_decode($response, true);
                            $ip = $data['ip'] ?? 'Unknown IP';
                        @endphp
                        <p class="wt font1 ds2">{{ auth()->user()->username }}  • ({{ $ip }})</p>
                        <form id="upload-profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <button type="button" id="upload-profile-btn" class="font1 button ds">{{ __('messages.upload_profile_image') }}</button>
                                <input type="file" name="profile_picture" id="profile-pic-input" style="display: none;">
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <div class="displayed-categories ds">
                <form action="{{ route('profile.categories.update') }}" method="POST">
                    @csrf
                    <p class="font1 wt ds2 sub-title-select-cat">{{ __('messages.homepage_categories') }}</p>
                    @php
                        $userCategories = auth()->user()->categories ?? [];
                    @endphp
                    <div class="form-group">
                        <label class="checkbox-container font1 wt ds2">
                            <input class="custom-checkbox" type="checkbox" name="categories[]" value="games" {{ in_array('games', $userCategories) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            {{ __('messages.games') }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-container font1 wt ds2">
                            <input class="custom-checkbox" type="checkbox" name="categories[]" value="tech" {{ in_array('tech', $userCategories) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            {{ __('messages.tech') }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-container font1 wt ds2">
                            <input class="custom-checkbox" type="checkbox" name="categories[]" value="movies" {{ in_array('movies', $userCategories) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            {{ __('messages.movies') }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-container font1 wt ds2">
                            <input class="custom-checkbox" type="checkbox" name="categories[]" value="entertainment" {{ in_array('entertainment', $userCategories) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            {{ __('messages.entertainment') }}
                        </label>
                    </div>
                    <button type="submit" class="font1 button cat-button">{{ __('messages.save') }}</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/profile.js') }}"></script>
</x-layout>