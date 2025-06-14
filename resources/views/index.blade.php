<x-layout>
    <x-slot name="title">
        Delafret: Jaunākās ziņas
    </x-slot>

    <x-suggested :articles="$latestArticles" />

    @if (!empty($categorizedArticles))
        <div class="categorized-articles-container center">
            @foreach ($categorizedArticles as $categoryKey => $articles)
                <div class="category-section ds">
                    @php
                        $categoryDisplayNames = [
                            'games' => 'Videospēles',
                            'tech' => 'Tehnoloģija',
                            'movies' => 'Filmas & TV',
                            'entertainment' => 'Izklaides',
                        ];
                    @endphp
                    <p class="font1 wt title ct ds" id="{{ $categoryKey }}-cat-text">{{ $categoryDisplayNames[$categoryKey] ?? ucfirst($categoryKey) }}</p>

                    <div class="articles">
                        @foreach ($articles as $article)
                            <div class="article ds">

                                <a class="image-container" href="{{ route('articles.show', $article) }}">
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->thumbnail_text ?? $article->title }}" class="ds article-thumbnail">
                                </a>
                                <div class="extra-info-container">
                                    <a class="font1 wt article-title-index ds2" href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                                    <div class="transparent-color aditional-info">
                                        <p class="font1 gt">Autors: {{ $article->author }}</p>
                                        <p class="font1 gt">Publicēts: {{ $article->created_at->format('d.m.Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>