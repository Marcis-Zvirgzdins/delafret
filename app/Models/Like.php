<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'article_id',
        'liked',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}