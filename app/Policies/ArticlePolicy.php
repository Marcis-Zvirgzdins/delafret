<?php
namespace App\Policies;

use App\Models\User;

class ArticlePolicy
{
    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }
}