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
</x-layout>