<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Article;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Feedback::create([
            'article_id' => $article->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
}