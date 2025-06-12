<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

Class BookmarkController extends Controller {

    public function toggle(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);

        $user = $request->user();
        $articleId = $request->article_id;

        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('article_id', $articleId)
            ->first();


        if ($bookmark) {
            $bookmark->delete();
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'article_id' => $articleId,
            ]);
        }

        return back();
    }
}


