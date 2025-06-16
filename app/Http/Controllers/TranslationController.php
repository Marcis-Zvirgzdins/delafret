<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller 
{
    public function store(Request $request)
{

    $validated = $request->validate([
        'article_id' => 'required|exists:articles,id',
        'language' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'author' => 'required|string|max:255',
        'thumbnail_text' => 'nullable|string|max:255',
    ]);

    Translation::create($validated);

    return redirect()->route('articles.show', ['article' => $validated['article_id']])
                     ->with('success', 'Translation created successfully!');
}

}