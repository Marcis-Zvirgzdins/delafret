<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create()
    {
        $this->authorize('create', \App\Models\Article::class);

        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image',
            'thumbnail_text' => 'nullable|string|max:255',
            'category' => 'required|in:games,tech,movies,entertainment',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);
    
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
    
        $validated['user_id'] = auth()->id();
    
        Article::create($validated);
    
        return redirect()->route('index')->with('success', 'Article created successfully!');
    }

    public function category($category)
    {
        $validCategories = ['games', 'tech', 'movies', 'entertainment'];
        if (!in_array($category, $validCategories)) {
            abort(404, 'Category not found');
        }
    
        $articles = Article::where('category', $category)->latest('created_at')->paginate(10);

        return view('articles.category', compact('articles', 'category'));
    }

    public function show(Article $article)
    {
        $relatedArticles = Article::where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();
    
        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function translate($article_id)
    {
        $article = Article::findOrFail($article_id);

        return view('articles.translate', compact('article'));
    }

    public function edit($article_id)
    {
        $article = Article::findOrFail($article_id);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $article_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'thumbnail_text' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::findOrFail($article_id);
        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'thumbnail_text' => $request->thumbnail_text,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.show', $article->id)->with('success', 'Raksts veiksmīgi atjaunināts.');
    }
}