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
            'thumbnail' => 'nullable|image',
            'category' => 'required|in:games,tech,movies,entertainment',
            'content' => 'required|string',
            'author' => 'required|string|max:255'
        ]);
    
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
    
        $validated['user_id'] = auth()->id();
    
        Article::create($validated);
    
        return redirect()->route('index')->with('success', 'Article created successfully!');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
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
}