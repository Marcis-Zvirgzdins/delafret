<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $article->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('articles.show', $article->id)->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {    
        if (auth()->user()->role === 'admin' || auth()->id() === $comment->user_id) {
            $comment->delete();
            return redirect()->back()->with('success', 'Komentārs veiksmīgi dzēsts.');
        }
    
        return redirect()->back()->with('error', 'Jums nav tiesību dzēst šo komentāru.');
    }
}