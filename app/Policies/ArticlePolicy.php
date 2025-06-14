<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }
    public function edit(User $user, Article $article)
    {
        return $user->id === $article->user_id || $user->role === 'admin';
    }
    public function translate(User $user, Article $article)
    {
        return $user->id === $article->owner_id
            || $user->role === 'translator'
            || $user->role === 'admin';
    }
}