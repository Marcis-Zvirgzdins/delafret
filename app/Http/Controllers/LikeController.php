<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Request $request)
{
    $request->validate([
        'article_id' => 'required|integer',
        'action' => 'required|in:like,dislike',
    ]);

    $userId = Auth::id();
    $articleId = $request->article_id;
    $action = $request->action;

    $entry = Like::firstOrNew([
        'user_id' => $userId,
        'article_id' => $articleId,
    ]);

    $current = $entry->liked ?? 0;
    $new = match ([$action, $current]) {
        ['like', 1] => 0, // Nospiests like, ar 1 vērt.
        ['like', -1], ['like', 0] => 1,
        ['dislike', -1] => 0, // Nospiests dislike, ar -1 vērt.
        ['dislike', 1], ['dislike', 0] => -1,
        default => $current,
    };

    $entry->liked = $new;
    $entry->save();

    return back();
}
}