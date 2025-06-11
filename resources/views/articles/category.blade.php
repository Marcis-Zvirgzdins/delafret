<x-layout>
    <x-slot name="title">
        Delafret: {{ ucfirst($category) }}
    </x-slot>

    <h1>{{ ucfirst($category) }}</h1>

    @if($articles->isEmpty())
        <p>Nav rakstu.</p>
    @else
        <ul>
            @foreach($articles as $article)
            
                @if($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="thumbnail">
                @endif
                <h2><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
                <p>Autors: {{ $article->author }}</p>
                <p>Publicēts: {{ $article->created_at ? $article->created_at->format('M d, Y') : 'No Date' }}</p>
            @endforeach
        </ul>

        {{ $articles->links() }}
    @endif
</x-layout>