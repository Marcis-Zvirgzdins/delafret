<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'private' => 'nullable|boolean',
        ]);

        if ($request->private) {
            Feedback::create([
                'article_id' => $article->id,
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);
        } 
        else {
            Comment::create([
                'article_id' => $article->id,
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);
        }

        return redirect()->back()->with('success', 'Komentārs veiksmīgi pievienots.');
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