<div class="suggested-articles">
    @if($articles->isEmpty())
        <p>Nav raksti.</p>
    @else
        @foreach($articles as $article)
            <div class="article">
                @if($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="thumbnail">
                @endif
                <h3><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h3>
                <p>Kategorija: {{ ucfirst($article->category) }}</p>
                <p>Publicēts: {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Not published' }}</p>
            </div>
        @endforeach
    @endif
</div>