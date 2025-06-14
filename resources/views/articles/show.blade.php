<x-layout>
    <x-slot name="title">
        Delafret: {{ $article->title }}
    </x-slot>

    <div class="mw14 center p142 article-container-container">
        <div class="article-container-main-container">
            <div class="article-container-main ds">
                <a href="{{ route('articles.category', strtolower($article->category)) }}" class="ds cat font1 {{ strtolower($article->category) }}-text">{{ ucfirst($article->category) }}</a>

                <p class="wt title font1 ds2">{{ $article->title }}</p>

                @guest
                    <a class="bookmark-container transparent-color ds" href="{{ route('login') }}">
                        <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                    </a>
                @else
                    @php
                        $bookmarked = auth()->user()->bookmarks->contains('article_id', $article->id);
                    @endphp

                    <form method="POST" action="{{ route('bookmarks.toggle') }}">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                             
                        <button type="submit" class="bookmark-container transparent ds" id="bookmark-button">
                            <img src="{{ asset($bookmarked ? 'icons/bookmark-filled-w-32.svg' : 'icons/bookmark-w-32.svg') }}" alt="Bookmark">
                        </button>
                    </form>
                @endif

                
                @can('translate', $article)
                    <a class="translate-container transparent ds {{ !auth()->user()->can('edit', $article) ? 'translate-translate-pos' : '' }}" href="{{ route('article.translate', $article->id) }}" href="{{ route('article.translate', $article->id) }}">
                        <img src="{{ asset('icons/translate-w-32.svg') }}" alt="Translate">
                    </a>
                @endcan

                @can('edit', $article)
                    <a class="edit-container transparent ds" href="{{ route('article.edit', $article->id) }}">
                        <img src="{{ asset('icons/edit-w-32.svg') }}" alt="Edit">
                    </a>
                @endcan

                <div class="aditional-info transparent-color ds">
                    <p class="font1 gt">Autors: {{ $article->author }}</p>
                    <p class="font1 gt">Publicēts: {{ $article->created_at ? $article->created_at->format('M d, Y, H:i') : 'No Date' }}</p>
                    @if($article->updated_at && $article->updated_at != $article->created_at)
                        <p class="font1 gt">Atjaunināts: {{ $article->updated_at->format('M d, Y, H:i') }}</p>
                    @endif
                </div>

                @if($article->thumbnail)
                <div class="banner-img">
                    <img class="ds" src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}" style="max-width: 100%; height: auto;">
                    @if(!empty($article->thumbnail_text))
                        <p class="gt font1 transparent ds">{{ $article->thumbnail_text }}</p>
                    @endif
                </div>
                @endif

                <div>
                    <p class="font1 wt ds2 nowrap article-contents">{{ $article->content }}</p>
                </div>
            </div>

            @auth
                <div class="comment-sub-container ds">
                    <form action="{{ route('comments.store', $article->id) }}" method="POST">
                        @csrf
                        <div class="comments-profile">   
                            @if (auth()->user()->profile_picture)
                                <img class="ds" src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile">
                            @else
                                <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                            @endif
                            <span class="gt2 font1 ds2">{{ auth()->user()->username }}</span>
                            @if(auth()->user()->role === 'admin')
                                    <p class="admin-badge font1 gt2 ds">Admin</p>
                            @endif
                            @if(auth()->user()->id === $article->user_id)
                                <p class="writer-badge font1 gt2 ds @if(auth()->user()->role != 'admin') mleft-8 @endif">Author</p>
                            @endif

                            <label class="checkbox-container font1 gt ds">
                                <input type="checkbox" name="private" value="1" class="custom-checkbox">
                                <span class="checkmark"></span>
                                Privāts komentārs
                            </label>
                        </div>
                        <textarea class="font1 wt ds" id="content" name="content" rows="3" required></textarea>
                        <button class="button font1 ds" type="submit">Publicēt</button>
                    </form>
                </div>
            @else
                <div class="comment-sub-container ds">
                    <form>
                        <div class="comments-profile">   
                            <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                            <span class="gt2 font1 ds2">Lietotājs</span>
                        </div>
                        <textarea class="font1 wt ds" id="content" name="content" rows="3" required></textarea>
                        <div class="button button-disabled font1 ds ct" type="submit">Publicēt</div>
                    </form>

                    <div class="comment-overlay transparent2">
                        <p class="font1 wtl ds2">Vēlaties komentēt?</p>
                        <a href="{{ route('register') }}" class="button font1 ds2">Reģistrējaties</a>
                    </div>
                </div>
            @endauth

            <div class="comment-container ds">
                <p class="font1 wtl ct comment-title ds2">Komentāri</p>
                @if($article->comments->isEmpty())
                <div class="comment empty ds">
                    <p class="font1 gt ct  ds">Nav komentāru.</p>
                </div>
                @else
                    @foreach($article->comments as $comment)
                        <div class="comment ds">
                            <div class="comment-profile">
                                @if($comment->user->profile_picture)
                                    <img class="ds" src="{{ asset('storage/' . $comment->user->profile_picture) }}" alt="Profile Picture">
                                @else
                                    <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                                @endif
                                <p class="font1 gt2 profile-name ds2">{{ $comment->user->username }}</p>
                                @if($comment->user->role === 'admin')
                                    <p class="admin-badge font1 gt2 ds">Admin</p>
                                @endif
                                @if($comment->user->id === $article->user_id)
                                    <p class="writer-badge font1 gt2 ds @if($comment->user->role != 'admin') mleft-8 @endif">Author</p>
                                @endif
                            </div>

                            <p class="font1 wt comment-main">{{ $comment->content }}</p>
                            <p class="font1 date gt pub-date-comment">{{ $comment->created_at ? $comment->created_at->format('M d, Y, H:i') : 'No Date' }}</p>

                            @auth
                                @if(auth()->user()->role === 'admin' || auth()->id() === $comment->user_id)
                                    <form class="delete-form" action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="delete-form ds">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-container ds">
                                            <img src="{{ asset('icons/delete-w-32.svg') }}" alt="Delete">
                                        </button>
                                    </form>
                                @endif
                            @endauth

                        </div>
                    @endforeach
                @endif
            </div>

            @can('edit', $article)
                <div class="comment-container ds private-comments">
                    <p class="font1 wtl ct comment-title ds2">Privātas atsauksmes</p>
                    @if($article->feedback->isEmpty())
                        <div class="comment empty ds">
                            <p class="font1 gt ct ds">Nav privātu atsauksmju.</p>
                        </div>
                    @else
                        @foreach($article->feedback as $feedback)
                            <div class="comment ds">
                                <div class="comment-profile">
                                    <p class="font1 gt2 profile-name ds2">{{ $feedback->user->username }}</p>
                                </div>
                                <p class="font1 wt comment-main">{{ $feedback->content }}</p>
                                <p class="font1 date gt pub-date-comment">{{ $feedback->created_at->format('M d, Y, H:i') }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endcan

        </div>
        <div class="side-container">
            @guest
                <div class="register-container ds">
                    <img class="ds" src="{{ asset('assets/logo-400.png') }}" alt="Delafret">
                    <p class="font1 wt main-text">Reģistrējaties Delafret</p>
                    <p class="font1 wt subtext">Priekš jaunākajām ziņām, skatiem un recenzijām</p>
                    <p class="font1 wt subtext">Saglabājiet mīļākos rakstus, iesaistaties diskusijās</p>

                    <div class="email-bar ds">
                        <input class="wt font1" placeholder="E-Pasts" id="email" type="text" name="email">
                        <button class="wt font1" type="button" id="register-button">
                            Reģistrēties
                        </button>
                    </div>
                </div>
            @endif

            <div class="like-container ds">
                @guest
                    <style>
                        .like-container {
                            margin-top: 16px;
                        }
                    </style>
                @endguest
                <div class="like-buttons ds">
                    <form method="POST" action="{{ route('like.toggle') }}" class="ds">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <input type="hidden" name="action" value="like">
                        <button type="submit" class="wt font1 like ds {{ $liked === 1 ? 'active' : '' }}">
                            <img src="{{ asset($liked === 1 ? 'icons/thumb-up-filled-w-32.svg' : 'icons/thumb-up-w-32.svg') }}" alt="Like">
                            <span class="font1 wt">{{ $article->likes()->where('liked', 1)->count() }}</span>
                        </button>
                    </form>

                    <div class="divider"></div>

                    <form method="POST" action="{{ route('like.toggle') }}" class="ds">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <input type="hidden" name="action" value="dislike">
                        <button type="submit" class="wt font1 dislike ds {{ $liked === -1 ? 'active' : '' }}">
                            <img src="{{ asset($liked === -1 ? 'icons/thumb-down-filled-w-32.svg' : 'icons/thumb-down-w-32.svg') }}" alt="Dislike">
                            <span class="font1 wt">{{ $article->likes()->where('liked', -1)->count() }}</span>
                        </button>
                    </form>

                    <button class="wt font1 share ds" id="copy-link-button" type="button">
                        <img src="{{ asset('icons/link-w-32.svg') }}" alt="Dislike">
                        <span class="font1 wt">Kopēt saiti</span>
                    </button>
                </div>
            </div>

            <div class="lang-container ds">
                <div class="ds create-element-container cat-container dropdown-menu-lang">
                    <label class="wt font1" for="category">Valoda</label>
                    <select class="font1 wt" id="category" name="category" required>
                        <option value="games">Latviešu</option>
                        <option value="tech">Angļu</option>
                    </select>
                    @error('category')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="end-container"></div>
                </div>
            </div>

            <div class="related-articles ds">
                <p class="font1 wtl ct related-title ds2">Turpinat lasīt</p>
                @if($similarArticles->isEmpty())
                    <div class="empty ds">
                        <p class="font1 gt ct ds">Nav saistītu rakstu</p>
                    </div>
                @else
                    @foreach($similarArticles as $related)
                        <div class="related-container ds">
                            <a class="related-thumbnail" href="{{ route('articles.show', $related->id) }}">
                                <img class="ds" src="{{ asset('storage/' . $related->thumbnail) }}" alt="{{ $related->title }}">
                            </a>
                            <div class="side-container">
                                <a class="category {{ strtolower($related->category) }}-text font1 wt ds" href="{{ route('articles.category', strtolower($article->category)) }}">{{ $related->category }}</a>
                                <a class="title wt font1 ds2 title" href="{{ route('articles.show', $related->id) }}">
                                    {{ $related->title }}
                                </a>
                                <p class="transparent-color gt font1">{{ $related->created_at->format('M d, Y') }} • {{ $related->author }}</p>
                            </div>

                            <a class="bookmark-container transparent ds" href="{{ route('login') }}">
                                <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                            </a>

                            
                            @guest
                                <a class="bookmark-container transparent ds" href="{{ route('login') }}">
                                    <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                                </a>
                            @else
                                @php
                                    $bookmarked = auth()->user()->bookmarks->contains('article_id', $related->id);
                                @endphp

                                <form method="POST" action="{{ route('bookmarks.toggle') }}">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $related->id }}">
                                    <button type="submit" class="bookmark-container transparent ds" id="bookmark-button">
                                        <img src="{{ asset($bookmarked ? 'icons/bookmark-filled-w-32.svg' : 'icons/bookmark-w-32.svg') }}" alt="Bookmark">
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/view-article.js') }}"></script>
</x-layout>