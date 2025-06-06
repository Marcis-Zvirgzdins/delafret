<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function manage(User $user)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }
}