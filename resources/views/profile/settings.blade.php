<x-layout>
    <x-slot name="title">
        Delafret: Rediģēt profilu
    </x-slot>

    <div class="profile-picture">
        @if (auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
            <form action="{{ route('profile.remove') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove Profile Picture</button>
            </form>
        @else
            <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
        @endif
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="profile_picture">Upload Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <form action="{{ route('profile.language.update') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="language">Choose Language</label>
            <select name="language" id="language" class="form-control">
                <option value="en" {{ auth()->user()->language === 'en' ? 'selected' : '' }}>English</option>
                <option value="lv" {{ auth()->user()->language === 'lv' ? 'selected' : '' }}>Latvian</option>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Save Language</button>
    </form>
</x-layout>