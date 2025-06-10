<x-layout>
    <x-slot name="title">
        Delafret: {{ $article->title }}
    </x-slot>

    <div class="mw14 center p142 article-container-container">
        <div class="article-container-main ds">

            <p>{{ ucfirst($article->category) }}</p>
            
            <p class="wt font1 ds2">{{ $article->title }}</p>

            <p>Autors: {{ $article->author }}</p>
            @if($article->updated_at && $article->updated_at != $article->created_at)
                <p>Atjaunināts: {{ $article->updated_at->format('M d, Y, H:i') }}</p>
            @else
                <p>Publicēts: {{ $article->created_at ? $article->created_at->format('M d, Y, H:i') : 'No Date' }}</p>
            @endif

            @if($article->thumbnail)
            <div class="banner-img">
                <img class="ds" src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}" style="max-width: 100%; height: auto;">
                @if(!empty($article->thumbnail_text))
                    <p class="gt font1 transparent ds">{{ $article->thumbnail_text }}</p>
                @endif
            </div>
            @endif

            <div>
                <p>{{ $article->content }}</p>
            </div>

        </div>
        <div class="side-container">

        </div>
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