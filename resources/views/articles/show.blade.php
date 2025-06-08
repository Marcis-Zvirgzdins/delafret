<x-layout>
    <x-slot name="title">
        Delafret: {{ $article->title }}
    </x-slot>

    <h1>{{ $article->title }}</h1>

    @if($article->thumbnail)
        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}" style="max-width: 100%; height: auto;">
    @endif

    <p><strong>Category:</strong> {{ ucfirst($article->category) }}</p>
    <p><strong>Author:</strong> {{ $article->author }}</p>
    <p><strong>Published:</strong> {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Not published' }}</p>

    <div>
        <p>{{ $article->content }}</p>
    </div>


    <!-- Komentāru sadaļa -->
    @auth
        <form action="{{ route('comments.store', $article->id) }}" method="POST">
            @csrf
            <div>
                <label for="content">Pievienot komentāru:</label>
                <textarea id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit">Pievienot</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Pieslēdzaties</a>, lai pievienotu komentāru</p>
    @endauth


    <h2>Komentāri</h2>
    @foreach($article->comments as $comment)
        <div class="comment">
            @if($comment->user->profile_picture)
                <img src="{{ asset('storage/' . $comment->user->profile_picture) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
            @endif
            <p>{{ $comment->user->username }}</p>
            <p>{{ $comment->content }}</p>

            <p>Pievienots: {{ $comment->created_at->format('M d, Y \a\t H:i') }}</p>
        </div>
    @endforeach
</x-layout>